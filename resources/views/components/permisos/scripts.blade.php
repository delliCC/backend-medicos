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
              columns: [ 0]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "permisos/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "name" },
          { "data": "accion" }
        ]
        $('#permisosTable').DataTable(configuracionesBasicasDatatable);
      });

      $('#formPermiso').submit(event => {
        const idPermiso = event.target['permiso_id'].value
        const url = idPermiso ? `/permisos/actualizar/${idPermiso}` : '/permisos/guardar'
        const method = idPermiso ? 'PUT' : 'POST'

        $.ajax({
          url,
          method,
          data: {
            '_token': "{{ csrf_token() }}",
            'name': event.target['name'].value
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
          console.log(data)
          alert(data.responseJSON.errors.metodo[0])
        });

        event.preventDefault();
      });

      function editarRol(id, name) {
        $('#permiso_id').val(id);
        $('#name').val(name);
      }

    </script>
@endsection