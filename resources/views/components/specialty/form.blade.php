<div class="modal-body">
    <div class="col-12 mb-1">
        <input type="hidden" id="id-especialidad">
        <fieldset class="form-group">
            <label for="especialidad">Especialidad</label>
            <input type="text" id="input-especialidad" value="{{ old('especialidad', isset($especialidad) ? $especialidad->especialidad : '') }}" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad"  placeholder="Especialidad">
            @error('especialidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success  btn-form-block"><i data-feather="save"></i> Guardar</button>
</div>
