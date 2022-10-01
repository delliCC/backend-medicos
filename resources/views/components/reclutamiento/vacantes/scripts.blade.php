@include('components/scriptsDataTable')

@section('page-script')
  {{-- Page js files --}}
    <script src="{{ asset('js/scripts/tables/configuracionBasicaDatatable.js') }}"></script>
    <script> 
      $(function () {
        'use strict';
        configuracionesBasicasDatatable['buttons'] = [
          {
            extend: 'pdf',
            exportOptions: {
              columns: [ 0, 1, 2, 3, 4,5]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "vacantes/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "puesto_id" },
          { "data": "sucursal_id" },
          { "data": "cantidad" },
          { "data": "imagen_url" },
          { "data": "reclutador_id" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#tableVacantes').DataTable(configuracionesBasicasDatatable);
      });

      $('#sucursal_id').select2({
        dropdownAutoWidth: true,
        dropdownParent: $('#sucursal_id').parent(),
        width: '100%',
      });
 
      $('#formVacantes').on('submit', event => {

        let formData = new FormData();
        formData.append('puesto_id', $('#puesto_id').val());
        formData.append('sucursal_id[]', $('#sucursal_id').val());
        formData.append('cantidad', $('#cantidad').val());
        formData.append('requisitos', $('#requisitos').val());
        formData.append('funcion', $('#funcion').val());
        formData.append('salario', $('#salario').val());
        formData.append('prestaciones', $('#prestaciones').val());
        formData.append('horario', $('#horario').val());
        formData.append('imagen', $('#input-imagen')[0].files[0]);
       
        $.ajax({
            url: `${$('#formVacantes').attr('action')}?${$('#formVacantes').serialize()}`,
            method: 'POST',
            data: formData,
            processData: false,
            beforeSend: xhr => {
             
           }
          }).done(response => {
              Swal.fire({
                title: response.message,
                text: 'Los datos se guardaron correctamente',
                icon: 'success',
                customClass: {
                  confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
              });
              //location.reload()
         }).fail(function (data) {
          console.log(data)
         });
      });

      function editarEspecilidad(id, nombre) {
        $('#id-ficha').val(id);
        $('#input-nombre').val(nombre);
      }

      function changeStatus(event, id){
        event.preventDefault();
        let checked = event.target.checked

          Swal.fire({
            title: 'Cambiar Estatus',
            text: "¿Estas seguro desea cambiar el estatus?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si!',
            customClass: {
              confirmButton: 'btn btn-primary',
              cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
          }).then(function (result) {
            if (result.value){
              $.ajax({
                method: "GET",
                url: `/vacantes/status/${id}/${checked}`,
                beforeSend: function() {
                  console.log('loanding')
                },
                success: response => {
            
                  Swal.fire({
                    icon: 'success',
                    title: response.message,
                    text: '',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    }
                  });
                    event.target.checked = response.data.status
                }
              });
              
            }else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire({
                title: 'Cancelado',
                text: 'Revisa tus datos :)',
                icon: 'error',
                customClass: {
                  confirmButton: 'btn btn-success'
                }
              });
            }
          });
      }
    </script>
@endsection