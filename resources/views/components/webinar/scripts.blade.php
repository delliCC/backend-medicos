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
        configuracionesBasicasDatatable['ajax'] = "webinar/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "webinar_url" },
          { "data": "descripcion" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#tableWebinar').DataTable(configuracionesBasicasDatatable);
      });
 
      {{--  $('#formWebinar').submit(event => {
  
        let formData = new FormData();
        formData.append('nombre', $('#nombre').val());
        formData.append('fecha_inicio', $('#fecha_inicio').val());
        formData.append('descripcion', $('#descripcion').val());
        formData.append('nombre_medico', $('#nombre_medico').val());
        formData.append('especialidad', $('#especialidad').val());
        formData.append('ficha_nombre', $('#ficha_nombre').val());
        formData.append('ficha_descripcion', $('#ficha_descripcion').val());
        formData.append('webinar_url', $('#webinar_url')[0].files[0]);
        formData.append('trailer_url', $('#trailer_url')[0].files[0]);
        formData.append('imagen_portada', $('#imagen_portada')[0].files[0]);
        formData.append('imagen_medico_url', $('#imagen_medico_url')[0].files[0]);
        formData.append('ficha_url', $('#ficha_url')[0].files[0]);
        console.log($('#webinar_url')[0].files[0] )

        $.ajax({
            url: `${$('#formWebinar').attr('action')}?${$('#formWebinar').serialize()}`,
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

        }).fail(function (data) {
          console.log(data)
          alert(data.responseJSON.errors)
        });
      });     --}}

      function editarEspecilidad(id, nombre) {
        $('#webinar_id').val(id);
        $('#nombre').val(nombre);
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
                url: `/webinar/status/${id}/${checked}`,
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