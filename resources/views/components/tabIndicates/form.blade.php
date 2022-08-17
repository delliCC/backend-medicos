<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="especialidad">Nombre</label>
            <input type="text" value="{{ old('nombre', isset($ficha) ? $ficha->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
            @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    <div class="col-xl-12 col-md-12 col-12">
        <fieldset class="form-group">
            <label for="direccion">Descripción <i style="color: red">*</i></label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"  placeholder="Descripción">
                {{ isset($ficha) ? $ficha->descripcion : '' }}
            </textarea>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
</div>
<div class="modal-footer">
    <a href="{{ route('tabIndicates.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="button" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>