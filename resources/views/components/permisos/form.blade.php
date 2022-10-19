<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <input type="hidden" id="permiso_id">
            <label for="name">Ruta</label>
            <input type="text" id="name"  value="{{ old('name', isset($datos) ? $datos->name : '') }}" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Ruta">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

</div>
<div class="modal-footer">
    <a href="{{ route('permissions.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>