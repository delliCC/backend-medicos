<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="metodo">Método</label>
            <input type="text" value="{{ old('metodo', isset($metodo) ? $metodo->metodo : '') }}" class="form-control @error('metodo') is-invalid @enderror" name="metodo"  placeholder="metodo">
            @error('metodo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
</div>
<div class="modal-footer">
    <a href="{{ route('method.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="button" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>