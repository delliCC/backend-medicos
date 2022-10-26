@include('components/scriptsDataTable')

@section('page-script')
  {{-- Page js files --}}
    <script src="{{ asset('js/scripts/tables/configuracionBasicaDatatable.js') }}"></script>
    <script> 
      const idDB = "{{!empty($medico->id) ? $medico->id : ''}}"
      console.log('idDB webinar',idDB)
      $(function () {
        'use strict';
        configuracionesBasicasDatatable['buttons'] = [
          {
            extend: 'pdf',
            exportOptions: {
              columns: [ 0,1,2,3,4]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = `listar/`+idDB
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "medico" },
          { "data": "fecha_inicio" },
          { "data": "fecha_fin" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#historyWebinarTable').DataTable(configuracionesBasicasDatatable);
      });

      {{--  $.ajax({
        method: "GET",
        url: `/history-webinar/listar/`+idDB,
        beforeSend: function() {
          console.log('loanding')
        },
        success: response => {
          console.log('response',response)
        }
      });  --}}
//-------------------------------  Capacitacion  -----------------------------------------------

      console.log('idDB capacitacion',idDB)
      $(function () {
        'use strict';
        configuracionesBasicasDatatable['buttons'] = [
          {
            extend: 'pdf',
            exportOptions: {
              columns: [ 0,1,2,3,4]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = `listar/training/`+idDB
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "medico" },
          { "data": "fecha_inicio" },
          { "data": "fecha_fin" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#historyTrainingTable').DataTable(configuracionesBasicasDatatable);
      });

    </script>
@endsection