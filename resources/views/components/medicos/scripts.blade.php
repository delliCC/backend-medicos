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
              columns: [ 0, 1, 2, 3, 4 ]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "medicos/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "correo" },
          { "data": "telefono" },
          { "data": "tipo_medico" },
          { "data": "especialidad_id" },
          { "data": "accion" }
        ]
        $('#medicos-table').DataTable(configuracionesBasicasDatatable);
      });

      function verEspecialidad(){
        var selected = document.getElementById('tipo_medico').value
        if(selected == "Especialista"){
          $("#especialidad_id").val([]).trigger("change");
          $("#especialidades").css("display","block");
        }else{
          $("#especialidad_id").val([]).trigger("change");
          $("#especialidades").css("display","none");
        }
      }
    </script>
@endsection