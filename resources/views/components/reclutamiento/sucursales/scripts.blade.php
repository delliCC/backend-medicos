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
        configuracionesBasicasDatatable['ajax'] = "empleados/listar"
        configuracionesBasicasDatatable['columns'] = [
          { "data": "nombre" },
          { "data": "correo" },
          { "data": "telefono" },
          { "data": "status" },
          { "data": "accion" }
        ]
        $('#employees-table').DataTable(configuracionesBasicasDatatable);
      });

      var settings = {
        "url": "https://api.countrystatecity.in/v1/countries/IN/states/MH/cities",
        "method": "GET",
        "headers": {
          "X-CSCAPI-KEY": "WHNBQUFjTzAwY01CRVhpbDNPQnl1OFBLWFZMczJxWWVzZTJGWG5TQQ=="
        },
      };
      
      $.ajax(settings).done(function (response) {
        console.log(response);
      });

      {{--  function geocode(){
        var location = '17.9697117-92.9208398'
        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
          params:{
            address:location,
            key:'AIzaSyCh1gZvUsD9ljetIt-i5jfTPtXhHB8uq7Y'
          }
        }).then(function(response){
          console.log('response', response)
        }).catch(function(error){
          console.log('error',error)
        })
      }  --}}

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
                url: `/empleados/status/${id}/${checked}`,
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