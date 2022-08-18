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
              columns: [ 0, 1 ]
            }
          }
        ]

        configuracionesBasicasDatatable['processing'] = true
        configuracionesBasicasDatatable['serverSide'] = true
        configuracionesBasicasDatatable['ajax'] = "especialidad/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "especialidad" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#especialidad-table').DataTable(configuracionesBasicasDatatable);
      });

      $('#form-especialidad').submit(event => {
        const idEspecialidad = event.target['id-especialidad'].value
        const url = idEspecialidad ? `/especialidad/actualizar/${idEspecialidad}` : '/especialidad/guardar'
        const method = idEspecialidad ? 'PUT' : 'POST'

        $.ajax({
          url,
          method,
          data: {
            '_token': "{{ csrf_token() }}",
            'especialidad': event.target['input-especialidad'].value
          },
          beforeSend: xhr => {
            $('#loading').show();
          }
        }).done(response => {
          location.reload()
        }).fail((xhr, status, err) => {
          console.log(err);
        });

        event.preventDefault();
      });

      function editarEspecilidad(id, especialidad) {
        $('#id-especialidad').val(id);
        $('#input-especialidad').val(especialidad);
      }
      
    </script>
@endsection