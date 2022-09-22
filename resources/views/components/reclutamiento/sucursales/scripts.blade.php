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
              columns: [ 0, 1, 2, 3, 4,5 ]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "sucursales/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "direccion" },
          { "data": "correo" },
          { "data": "telefono" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#tableSucursal').DataTable(configuracionesBasicasDatatable);
      });

      $.ajax({
        method: "GET",
        url: `{{ asset('js/scripts/estado_municipios.json') }}`,
        beforeSend: function() {
          console.log('loanding')
        },
        success: response => {
         
          response.forEach(function(estado) {
            $('#selectEstado').append('<option value="'+estado.nombre+'">'+estado.nombre+'</option>');
          });  
        }
      });

      function cargarMunicipio(estado) {
        var idEstado = document.getElementById("selectEstado").value;
        $.ajax({
          method: "GET",
          url: `{{ asset('js/scripts/estado_municipios.json') }}`,
          beforeSend: function() {
            console.log('loanding')
          },
          success: response => {
              var estado = response.filter(item => item.nombre == idEstado )
              estado[0].municipios.forEach(function(municipio) {
                $('#selectMunicipio').append('<option value="'+municipio+'">'+municipio+'</option>'); 
              });  
          }
        });
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
                url: `/sucursales/status/${id}/${checked}`,
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