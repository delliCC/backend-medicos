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
              columns: [ 0, 1]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "puestos/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "puesto" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#tablePuesto').DataTable(configuracionesBasicasDatatable);
      });

      $('#formPuesto').submit(event => {
        const idPuesto = event.target['idPuesto'].value
        const url = idPuesto ? `/puestos/actualizar/${idPuesto}` : '/puestos/guardar'
        const method = idPuesto ? 'PUT' : 'POST'

        $.ajax({
          url,
          method,
          data: {
            '_token': "{{ csrf_token() }}",
            'puesto': event.target['inputPuesto'].value,
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
          console.log(data.responseJSON.message)
          alert(data.responseJSON.errors.puesto[0])
        });

        event.preventDefault();
      });

      function editarPuesto(id, puesto) {
        $('#idPuesto').val(id);
        $('#inputPuesto').val(puesto);
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
                url: `/puestos/status/${id}/${checked}`,
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