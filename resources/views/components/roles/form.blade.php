<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <input type="hidden" id="rol_id">
            <label for="name">Rol</label>
            <input type="text" id="name"  value="{{ old('name', isset($datos) ? $datos->name : '') }}" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Rol">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

</div>
<div class="modal-footer">
    <a href="{{ route('roles.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>