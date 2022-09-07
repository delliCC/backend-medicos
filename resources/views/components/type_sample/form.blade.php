<div class="modal-body">
    <div class="col-12 mb-1">
        <input type="hidden" id="id-muestra">
        <fieldset class="form-group">
            <label for="muestra">Muestra</label>
            <input type="text" id="input-muestra"  value="{{ old('muestra', isset($muestra) ? $muestra->muestra : '') }}" class="form-control @error('muestra') is-invalid @enderror" name="muestra"  placeholder="Muestra">
            @error('muestra')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-form-block"><i data-feather="save"></i> Guardar</button>
</div>