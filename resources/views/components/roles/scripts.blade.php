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

      function editarRol(id, name) {
        $('#rol_id').val(id);
        $('#name').val(name);
      }

    </script>
@endsection