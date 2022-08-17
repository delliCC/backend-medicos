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
        configuracionesBasicasDatatable['ajax'] = "ficha-indica/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "especialidad" },
          { "data": "url" },
          { "data": "descripcion" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#ficha-table').DataTable(configuracionesBasicasDatatable);
      });
    </script>
@endsection