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
        configuracionesBasicasDatatable['ajax'] = "webinar/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "webinar_url" },
          { "data": "descripcion" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#tableWebinar').DataTable(configuracionesBasicasDatatable);
      });
 
      $('#formWebinar').submit(event => {
      
        var inputWebinar = document.getElementById("webinar_url");
        var inputFilePortada = document.getElementById("imagen_portada");
        var inputFileTrailer = document.getElementById("trailer_url");
        var inputFileFoto = document.getElementById("imagen_medico_url");
        var inputFichaIndica = document.getElementById("ficha_url");
        var formData = new FormData();

        formData.append('nombre', $('#nombre').val());
        formData.append('fecha_inicio', $('#fecha_inicio').val());
        formData.append('descripcion', $('#descripcion').val());
        formData.append('nombre_medico', $('#nombre_medico').val());
        formData.append('especialidad', $('#especialidad').val());
        formData.append('ficha_nombre', $('#ficha_nombre').val());
        formData.append('ficha_descripcion', $('#ficha_descripcion').val());

        for(var a=0; a<inputWebinar.files.length; a++){
          var webinar = inputWebinar.files[a]
          formData.append('webinar_url[]', webinar);
        }

        for(var a=0; a<inputFileTrailer.files.length; a++){
          var videoTrailer = inputFileTrailer.files[a]
          console.log(videoTrailer)
          formData.append('trailer_url[]', videoTrailer);
        }

        for(var a=0; a<inputFilePortada.files.length; a++){
          var imagenPortada = inputFilePortada.files[a]
          console.log(imagenPortada)
          formData.append('imagen_portada[]', imagenPortada);
        }

        for(var a=0; a<inputFileFoto.files.length; a++){
          var foto = inputFileFoto.files[a]
          console.log(foto)
          formData.append('imagen_medico_url[]', foto);
        }

        for(var a=0; a<inputFichaIndica.files.length; a++){
          var fichaIndica = inputFichaIndica.files[a]
          console.log(fichaIndica)
          formData.append('ficha_url[]', fichaIndica);
        }
       
        $.ajax({
            url: `${$('#formWebinar').attr('action')}?${$('#formWebinar').serialize()}`,
            method: 'POST',
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
              {{--  location.reload()  --}}
         }).fail(function (data) {
          console.log(data)
           alert(data.responseJSON.errors)
         });

      });  


      function editarEspecilidad(id, nombre) {
        $('#webinar_id').val(id);
        $('#nombre').val(nombre);
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
                url: `/webinar/status/${id}/${checked}`,
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