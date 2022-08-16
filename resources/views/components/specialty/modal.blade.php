<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Crear especialidad</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="needs-validation" id="addNewSpecialty" action="{{ route('specialty.store')}}" method="POST" novalidate>
            @csrf
            <div class="modal-body">
              <div class="col-12 mb-1">
                <fieldset class="form-group">
                    <label for="hospital_trabajo">Hospital</label>
                    <input type="text" value="{{ old('especialidad', isset($especialidad) ? $especialidad->especialidad : '') }}" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad"  placeholder="especialidad">
                    @error('especialidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
              </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success waves-effect">Guardar</button>
            <button type="button" class="btn btn-outline-dark waves-effect" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="editSpecialty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Editar especialidad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="needs-validation" id="editSpecialty"  method="POST" novalidate>
          @csrf
          <div class="modal-body">
            <div class="col-12">
              <label class="form-label" for="especialidad">Especialidad</label>
              {{--  value="{{ $dato->especialidad }}"  --}}
              <input type="text" name="especialidad" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success waves-effect">Guardar</button>
            <button type="button" class="btn btn-outline-dark waves-effect" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>