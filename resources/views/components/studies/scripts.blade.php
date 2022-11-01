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
          { "data": "metodo" },
          { "data": "muestra" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#estudios-table').DataTable(configuracionesBasicasDatatable);
      });

      const muestraDB = "{{!empty($datos) ? $datos->tipoMuestra : ''}}"
      $('#muestra_id').select2({
        dropdownAutoWidth: true,
        dropdownParent: $('#muestra_id').parent(),
        width: '100%',
      });

      const metodoDB = "{{!empty($datos) ? $datos->tipoMetodo : ''}}"
      $('#metodo_id').select2({
        dropdownAutoWidth: true,
        dropdownParent: $('#metodo_id').parent(),
        width: '100%',
      });

      $('#formStudie').submit(event => {
        var inputFileImage = document.getElementById("input-imagen");
        var inputFileImageDestacada = document.getElementById("input-imagen-destacada");

        var selectMetodo = document.getElementById("metodo_id").value;
        var selectMuestra = document.getElementById("muestra_id").value;
        var formData = new FormData();

        formData.append('titulo', $('#titulo').val());
        formData.append('descripcion', $('#descripcion').val());
        formData.append('informacion_clinica', $('#informacion').val());
        formData.append('precauciones', $('#precauciones').val());
        formData.append('indicaciones', $('#indicaciones').val());

        for(var a=0; a<selectMetodo.length; a++){
          var metodos = selectMetodo[a]
          formData.append('metodo_id[]', metodos);
        }

        for(var a=0; a<selectMuestra.length; a++){
          var sample = selectMuestra[a]
          formData.append('muestra_id[]', sample);
        }

        for(var a=0; a<inputFileImage.files.length; a++){
          var imagen = inputFileImage.files[a]
          formData.append('imagen[]', imagen);
        }

        for(var a=0; a<inputFileImageDestacada.files.length; a++){
          var imagenDestacada = inputFileImageDestacada.files[a]
          formData.append('imagen_destacada[]', imagenDestacada);
        }

        $.ajax({
            url: `${$('#formStudie').attr('action')}?${$('#formStudie').serialize()}`,
            method:'POST',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
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
           {{--  alert(data.responseJSON.errors.especialidad[0])  --}}
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