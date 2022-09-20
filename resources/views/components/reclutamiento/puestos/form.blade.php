<div class="modal-body">
    <div class="col-12 mb-1">
        <input type="hidden" id="idPuesto">
        <fieldset class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" id="inputPuesto" value="{{ old('puesto', isset($puesto) ? $datos->puesto : '') }}" class="form-control @error('puesto') is-invalid @enderror" name="puesto"  placeholder="Puesto">
            @error('puesto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-12 col-md-12 col-12">
        <fieldset class="form-group">
            <label for="funcion">Función <i style="color: red">*</i></label>
            <textarea class="form-control @error('funcion') is-invalid @enderror" id="inputFuncion" name="funcion" placeholder="Función">
                {{ isset($datos) ? $datos->funcion : '' }}
            </textarea>
            @error('funcion')
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