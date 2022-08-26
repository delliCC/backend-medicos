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

      function geocode(){
        var location = '17.9697117-92.9208398'
        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
          params:{
            address:location,
            key:'AIzaSyCh1gZvUsD9ljetIt-i5jfTPtXhHB8uq7Y'
          }
        }).then(function(response){
          console.log('response', response)
        }).catch(function(error){
          console.log('error',error)
        })
      }
    </script>
@endsection