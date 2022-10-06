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
              columns: [ 0, 1, 2, 3, 4, 5]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "postulantes/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "vacante_id" },
          { "data": "sucursal_id" },
          { "data": "nombre" },
          { "data": "reclutador_id" },
          { "data": "fecha_postulacion" },
          { "data": "estado_postulante" },
          { "data": "accion" }
        ]
        $('#tablePostulante').DataTable(configuracionesBasicasDatatable);
      });

      $('#sucursal_id').select2({
        dropdownAutoWidth: true,
        dropdownParent: $('#sucursal_id').parent(),
        width: '100%',
      });

      const estadoDB = "{{!empty($datos) ? $datos->estado : ''}}"
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

      const municipioDB = "{{!empty($datos) ? $datos->municipio : ''}}"
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
      
      function changeEstado(id, status){
        var estado = document.getElementById("valor").value;

          Swal.fire({
            title: 'Cambiar Estado del postulante',
            text: "¿Estas seguro desea cambiar el estado?",
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
                url: `/postulantes/estado/${id}/${estado}`,
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
                    console.log(response)
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
      function activarConyugeEstadoCivil(){
        var estadoCivilSelected = document.getElementById("estado_civil").value;

        if(estadoCivilSelected =="Soltero"){
            document.getElementById("campoConyugeTrabaja").style.display = "none";
        }else{
            document.getElementById("campoConyugeTrabaja").style.display = "block";
        }
      }

      function activarEscolaridad(){
        var tituloSelected = document.getElementById("titulo").value;

        if(tituloSelected =="Si"){
            document.getElementById("campoEscolarCedula").style.display = "block";
            document.getElementById("campoEscolarTrunco").style.display = "none";
        }else{
            document.getElementById("campoEscolarCedula").style.display = "none";
            document.getElementById("campoEscolarTrunco").style.display = "block";
        }
      }

      function activarEstudios(){
        var estudioSelected = document.getElementById("estudia_actualmente").value;

        if(estudioSelected =="Si"){
            document.getElementById("campoInstitucion").style.display = "block";
            document.getElementById("campoCarrera").style.display = "block";
            document.getElementById("campoSemestre").style.display = "block";
            document.getElementById("campoHorario").style.display = "block";
        }else{
            document.getElementById("campoInstitucion").style.display = "none";
            document.getElementById("campoCarrera").style.display = "none";
            document.getElementById("campoSemestre").style.display = "none";
            document.getElementById("campoHorario").style.display = "none";
        }
      }

      function activarMotivoSalida(){
          var motivoSelected = document.getElementById("motivo_salida").value;
        
          if(motivoSelected =="otros"){
              document.getElementById("campoMotivoCual").style.display = "block";
              console.log('motivoSelected',motivoSelected)
          }else{
              document.getElementById("campoMotivoCual").style.display = "none";
          }
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
                url: `/postulantes/status/${id}/${checked}`,
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