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
              columns: [ 0, 1, 2, 3]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "usuario/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "medico_id" },
          { "data": "username" },
          { "data": "email" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#usuario-table').DataTable(configuracionesBasicasDatatable);
      });

      $('#form-user').submit(event => {
        const idUser = event.target['id-user'].value
        console.log(idUser)
        const url = idUser ? `/usuario/actualizar/${idUser}` : '/usuario/guardar'
        const method = idUser ? 'PUT' : 'POST'
        console.log('url',url)
        console.log('method',method)
        $.ajax({
          url,
          method,
          data: {
            '_token': "{{ csrf_token() }}",
            'username': event.target['input-username'].value
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
          location.reload()
        }).fail(function (data) {
          alert(data.responseJSON.errors.metodo[0])
        });

        event.preventDefault();
      });

      function editarUser(id, username, email, medico_id) {
        $('#id-user').val(id);
        $('#input-username').val(username);
        $('#input-email').val(email);
        $('#input-medico_id').val(medico_id);
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
                url: `/usuario/status/${id}/${checked}`,
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