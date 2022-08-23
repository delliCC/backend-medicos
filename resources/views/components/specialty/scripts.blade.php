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
              columns: [ 0, 1 ]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "especialidad/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "especialidad" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#especialidad-table').DataTable(configuracionesBasicasDatatable);
      });

      $('#form-especialidad').submit(event => {
        {{--  event.preventDefault()  --}}
        const idEspecialidad = event.target['id-especialidad'].value
        {{--  console.log(idEspecialidad)  --}}
        const url = idEspecialidad ? `/especialidad/actualizar/${idEspecialidad}` : '/especialidad/guardar'
        const method = idEspecialidad ? 'PUT' : 'POST'
        {{--  console.log('url',url)  --}}
        {{--  console.log('method',method)  --}}
        $.ajax({
          url: url,
          method:method,
          data: {
            '_token': "{{ csrf_token() }}",
            'especialidad': event.target['input-especialidad'].value
          },
          beforeSend: xhr => {
            formSection.block({
              message: '<div class="spinner-border text-white" role="status"></div>',
              timeout: 1000,
              css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
              },
              overlayCSS: {
                opacity: 0.5
              }
            });
          }
        }).done(response => {
        
          $('#default').modal('hide')
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
          alert(data.responseJSON.errors.especialidad[0])
        });

        event.preventDefault();
      });

      function editarEspecilidad(id, especialidad) {
        $('#id-especialidad').val(id);
        $('#input-especialidad').val(especialidad);
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
                url: `/especialidad/status/${id}/${checked}`,
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