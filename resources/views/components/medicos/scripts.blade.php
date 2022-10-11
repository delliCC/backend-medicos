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

      const estadoDB = "{{!empty($medico) ? $medico->estado : ''}}"
      $.ajax({
        method: "GET",
        url: `{{ asset('js/scripts/estado_municipios.json') }}`,
        beforeSend: function() {
          console.log('loanding')
        },
        success: response => {
          response.forEach(function(estado) {
            let selected = estadoDB == estado.nombre ? 'selected' : undefined;
            $('#selectEstado').append('<option value="'+estado.nombre+'" '+selected+'>'+estado.nombre+'</option>');
          });  
        }
      });

      if(estadoDB) {
        setTimeout(() => {
          cargarMunicipio();
        }, 1000);
      }

      const municipioDB = "{{!empty($medico) ? $medico->municipio : ''}}"
      function cargarMunicipio() {
        var estadoSelected = document.getElementById("selectEstado").value;

        $.ajax({
          method: "GET",
          url: `{{ asset('js/scripts/estado_municipios.json') }}`,
          beforeSend: function() {
            console.log('loanding')
          },
          success: response => {
            var estadoFind = response.find(item => item.nombre == estadoSelected)

            $('#select2-municipios').empty();
            $('.select2-municipios').wrap('<div class="position-relative"></div>').select2({
              dropdownAutoWidth: true,
              dropdownParent: $('.select2-municipios').parent(),
              width: '100%',
            });
            $('#select2-municipios').append('<option value="">Selecciona una opción</option>');
            estadoFind.municipios.forEach(function(municipio) {
              let selected = municipioDB == municipio ? 'selected' : undefined;
              $('#select2-municipios').append('<option value="'+municipio+'" '+selected+'>'+municipio+'</option>');
            });  
          }
        });
      }

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