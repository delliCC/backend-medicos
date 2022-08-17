<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="especialidad">Especialidad</label>
            <input type="text" value="{{ old('especialidad', isset($especialidad) ? $especialidad->especialidad : '') }}" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad"  placeholder="Especialidad">
            @error('especialidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
</div>
<div class="modal-footer">
    <a href="{{ route('specialty.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="button" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>