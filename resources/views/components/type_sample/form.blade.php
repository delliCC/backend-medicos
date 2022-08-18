<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="muestra">Muestra</label>
            <input type="text" value="{{ old('muestra', isset($muestra) ? $muestra->muestra : '') }}" class="form-control @error('muestra') is-invalid @enderror" name="muestra"  placeholder="Muestra">
            @error('muestra')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
</div>
<div class="modal-footer">
    <a href="{{ route('sample.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="button" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>