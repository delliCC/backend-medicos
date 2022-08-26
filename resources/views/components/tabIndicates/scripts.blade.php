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
          { "data": "nombre" },
          { "data": "url" },
          { "data": "descripcion" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#ficha-table').DataTable(configuracionesBasicasDatatable);
      });

      $('#form-ficha').submit(event => {
        event.preventDefault();
       
        let headers = {
          Authorization: "token",
          {{--  'Content-Type':'multipart/form-data'  --}}
        };
        var inputFileImage = document.getElementById("input-video");
        var formData = new FormData();

        formData.append('nombre', $('#input-nombre').val());
        formData.append('descripcion', $('#input-descripcion').val());

        for(var a=0; a<inputFileImage.files.length; a++){
          var imagen = inputFileImage.files[a]
          console.log(imagen)
          formData.append('imagenes[]', imagen);
        }
		
        const idFicha = event.target['id-ficha'].value
         //--console.log(idFicha)
        const url = idFicha ? `/ficha-indica/actualizar/${idFicha}` : '/ficha-indica/guardar'
        const method = idFicha ? 'PUT' : 'POST'
         //--console.log('url',url,'metodo->'method)
        $.ajax({
            url,
            method,
            enctype: 'multipart/form-data',
            data: formData,
            { headers }
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
            $('#default').modal('hide')
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
           alert(data.responseJSON.errors.especialidad[0])
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
                url: `/ficha-indica/status/${id}/${checked}`,
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