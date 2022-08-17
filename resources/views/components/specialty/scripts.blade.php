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
    </script>
@endsection