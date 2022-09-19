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
              columns: [ 0, 1, 2, 3, 4]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "vacantes/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "puesto" },
          { "data": "imagen_url" },
          { "data": "lugar_trabajo" },
          { "data": "requisitos" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#vacantes-table').DataTable(configuracionesBasicasDatatable);
      });
 
      $('#formVacantes').submit(event => {
        return ;
        event.preventDefault();
        console.log('test')
       
        let headers = {
          Authorization: "token",
         // 'Content-Type':'multipart/form-data'
        };
 
        var inputFile = document.getElementById("input-imagen");
    
        var formData = new FormData();

        formData.append('puesto', $('#input-puesto').val());
        formData.append('requisitos', $('#input-requisitos').val());
        formData.append('funcion', $('#input-funcion').val());
        formData.append('salario', $('#input-salario').val());
        formData.append('prestaciones', $('#input-prestaciones').val());
        formData.append('horario', $('#horario').val());
        formData.append('lugar_trabajo', $('#lugar_trabajo').val());
        formData.append('reclutador_id', $('#reclutador_id').val());

        for(var a=0; a<inputFile.files.length; a++){
          var imagen = inputFile.files[a]
          console.log(imagen)
          formData.append('imagen[]', imagen);
        }
       
        $.ajax({
            url:'/vacantes/guardar',
            method:'POST',
            enctype: 'multipart/form-data',
            data: formData,
            headers: headers,
            processData: false,
            contentType: false,
            beforeSend: xhr => {
             
           }
          }).done(response => {
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
          console.log(data)
           alert(data.responseJSON.errors)
         });

      });  


      function editarEspecilidad(id, nombre) {
        $('#id-ficha').val(id);
        $('#input-nombre').val(nombre);
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
                url: `/vacantes/status/${id}/${checked}`,
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