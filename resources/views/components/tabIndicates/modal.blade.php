{{--  <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Registrar Ficha Indica</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" id="addNewSpecialty" action="{{ route('save-tab-indicates')}}" method="POST" novalidate>
        @csrf
        <div class="modal-body">
          <div class="col-12">
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="nombre">
          </div>
          <div class="col-12">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" rows="3" placeholder="descripción"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success waves-effect">Guardar</button>
          <button type="button" class="btn btn-outline-dark waves-effect" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>  --}}
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Crear Ficha Indica</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="mt-2" method="POST" action="{{ route('tabIndicates.store') }}">
          @csrf
          @include('components/tabIndicates/form')
        </form>
      </div>
  </div>
</div>

<div class="modal fade text-left" id="editSpecialty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Editar Ficha Indica</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{--  <form class="mt-2" method="POST" action="{{ route('tabIndicates.update', $especialidad->id) }}">  --}}
          @csrf
          @method('PUT')
          @include('components/tabIndicates/form')
      {{--  </form>  --}}
    </div>
  </div>
</div>
