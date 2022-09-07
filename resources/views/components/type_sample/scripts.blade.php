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
        configuracionesBasicasDatatable['ajax'] = "tipo-muestra/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "muestra" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#muestra-table').DataTable(configuracionesBasicasDatatable);
      });

      $('#form-muestra').submit(event => {
        const idMuestra = event.target['id-muestra'].value
        const url = idMuestra ? `/tipo-muestra/actualizar/${idMuestra}` : '/tipo-muestra/guardar'
        const method = idMuestra ? 'PUT' : 'POST'

        $.ajax({
          url,
          method,
          data: {
            '_token': "{{ csrf_token() }}",
            'muestra': event.target['input-muestra'].value
          },
          beforeSend: xhr => {
            
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
          location.reload()
        }).fail(function (data) {
          alert(data.responseJSON.errors.muestra[0])
        });

        event.preventDefault();
      });

      function editarSample(id, muestra) {
        $('#id-muestra').val(id);
        $('#input-muestra').val(muestra);
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
                url: `/tipo-muestra/status/${id}/${checked}`,
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