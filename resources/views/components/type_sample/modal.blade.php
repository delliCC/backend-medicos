<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Crear Tipo de Muestra</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="mt-2" method="POST" action="{{ route('sample.store') }}">
          @csrf
          @include('components/type_sample/form')
        </form>
      </div>
  </div>
</div>

<div class="modal fade text-left" id="editSpecialty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Editar Tipo de Muestra</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{--  <form class="mt-2" method="POST" action="{{ route('sample.update', $especialidad->id) }}">  --}}
          @csrf
          @method('PUT')
          @include('components/type_sample/form')
      {{--  </form>  --}}
    </div>
  </div>
</div>
