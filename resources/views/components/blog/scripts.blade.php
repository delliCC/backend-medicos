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
              columns: [ 0, 1, 2 ]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "blog/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "titulo" },
          { "data": "imagen_portada" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#blogTable').DataTable(configuracionesBasicasDatatable);
      });

      $('#formBlog').submit(event => {
        var inputFileDestacada = document.getElementById("imagen_destacada");
        var inputFileImagen = document.getElementById("imagen");

        var formData = new FormData();

        formData.append('titulo', $('#titulo').val());
        formData.append('descripcion', $('#descripcion').val());
        formData.append('descripcion_portada', $('#descripcion_portada').val());

        for(var a=0; a<inputFileDestacada.files.length; a++){
          var imagenDestacada = inputFileDestacada.files[a]
          formData.append('imagen_destacada[]', imagenDestacada);
        }

        for(var a=0; a<inputFileImagen.files.length; a++){
          var imagen = inputFileImagen.files[a]
          formData.append('imagen[]', imagen);
        }
		
        const idBlog = event.target['blog_id'].value

        const urlPost = `${$('#formBlog').attr('action')}?${$('#formBlog').serialize()}`
        const url = idBlog ? `/blog/actualizar/${idBlog}` : urlPost
        const method = idBlog ? 'PUT' : 'POST'

        $.ajax({
            url: `${$('#formBlog').attr('action')}?${$('#formBlog').serialize()}`,
            method: 'POST',
            data: formData,
            processData: false,
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
        }).fail(function (data) {
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
                url: `/blog/status/${id}/${checked}`,
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