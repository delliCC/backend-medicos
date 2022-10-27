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
        configuracionesBasicasDatatable['ajax'] = "roles/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "name" },
          { "data": "accion" }
        ]
        $('#rolesTable').DataTable(configuracionesBasicasDatatable);
      });

      $('#formRol').submit(event => {
        const idMetodo = event.target['rol_id'].value
        const url = idMetodo ? `/roles/actualizar/${idMetodo}` : '/roles/guardar'
        const method = idMetodo ? 'PUT' : 'POST'

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
          alert(data.responseJSON.errors)
        });

        event.preventDefault();
      });

      function editarRol(id, name) {
        $('#rol_id').val(id);
        $('#name').val(name);
      }

//      const idRolDB = "{{!empty($datos) ? $datos->id : ''}}"

      $('#formAsignacion').submit(event => {

        $.ajax({
          url:`/roles/asignacion/guardar`,
          method: 'POST',
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
          alert(data.responseJSON.errors)
        });

        event.preventDefault();
      });


    </script>
@endsection