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
              columns: [ 0, 1, 2, 3 ]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "capacitacion/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "training_url" },
          { "data": "descripcion" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#capacitacionTable').DataTable(configuracionesBasicasDatatable);
      });

      $('#formTraining').submit(event => {
  
        let formData = new FormData();
        formData.append('nombre', $('#nombre').val());
        formData.append('training_url', $('#training_url')[0].files[0]);
        formData.append('descripcion', $('#descripcion').val());
        formData.append('fecha_inicio', $('#fecha_inicio').val());
        formData.append('imagen_portada', $('#imagen_portada')[0].files[0]);
        formData.append('trailer_url', $('#trailer_url')[0].files[0]);
        formData.append('nombre_medico', $('#nombre_medico').val());
        formData.append('imagen_medico_url', $('#imagen_medico_url')[0].files[0]);
        formData.append('especialidad', $('#especialidad').val());
        
        $.ajax({
            url: `${$('#formTraining').attr('action')}?${$('#formTraining').serialize()}`,
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
              {{--  location.reload()  --}}
        }).fail(function (data) {
          console.log(data)
          alert(data.responseJSON.errors)
        });
      });  

      function editarTraining(id, nombre) {
        $('#training_id').val(id);
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
                url: `/capacitacion/status/${id}/${checked}`,
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