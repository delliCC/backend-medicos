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
        configuracionesBasicasDatatable['ajax'] = "estudios/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "titulo" },
          {{--  { "data": "descripcion" },  --}}
          { "data": "metodo" },
          { "data": "muestra" },
          {{--  { "data": "informacion_clinica" },  --}}
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#estudios-table').DataTable(configuracionesBasicasDatatable);
      });

      $('#form-studie').submit(event => {
        event.preventDefault();
       
        let headers = {
          Authorization: "token",
         // 'Content-Type':'multipart/form-data'
        };
        var inputFileImage = document.getElementById("input-imagen");
        var inputFileImageDestacada = document.getElementById("input-imagen-destacada");
        var formData = new FormData();

        formData.append('titulo', $('#input-titulo').val());
        formData.append('metodo_id', $('#select-metodo').val());
        formData.append('muestra_id', $('#select-muestra').val());
        formData.append('descripcion', $('#text-descripcion').val());
        formData.append('informacion_clinica', $('#text-informacion').val());
        formData.append('precauciones', $('#text-precauciones').val());

        for(var a=0; a<inputFileImage.files.length; a++){
          var imagen = inputFileImage.files[a]
          console.log(imagen)
          formData.append('imagenes[]', imagen);
        }

        for(var a=0; a<inputFileImageDestacada.files.length; a++){
          var imagenDestacada = inputFileImageDestacada.files[a]
          console.log(imagenDestacada)
          formData.append('imagenes[]', imagenDestacada);
        }

        $.ajax({
            url:'/estudios/guardar',
            method:'POST',
            enctype: 'multipart/form-data',
            data: formData,
            headers: headers,
            //--data: {
            //-- '_token': "{{ csrf_token() }}",
            //-- 'nombre': event.target['input-nombre'].value,
            //--  'descripcion': event.target['input-descripcion'].value
            //--},
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
           alert(data.responseJSON.errors.especialidad[0])
         });

      });


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
                url: `/estudios/status/${id}/${checked}`,
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