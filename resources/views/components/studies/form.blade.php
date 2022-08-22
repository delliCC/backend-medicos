<div class="row">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="divider divider-left  divider-success">
            <div class="divider-text">Datos de estudios</div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="nombre">Titulo <i style="color: red">*</i></label>
            <input type="text" value="{{ old('titulo', isset($datos) ? $datos->titulo : '') }}" class="form-control @error('titulo') is-invalid @enderror" name="titulo"  placeholder="Titulo">
            @error('titulo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="tipo_metodo">Tipo de Método</label>
            <select class="form-control"  class="form-control" name="metodo_id">
                <option value="" selected disabled> Selecciona una opción </option>
                @foreach ($tipoMetodo as $metodo)
                    <option {{isset($datos) ? $metodo->id == $datos->metodo_id ? 'selected' : '' : ''}}>{{ $metodo->metodo }}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="tipo_muestra">Tipo de Muestra</label>
            <select class="form-control"  class="form-control" name="muestra_id">
                <option value="" selected disabled> Selecciona una opción </option>
                @foreach ($tipoMuestra as $muestra)
                    <option {{isset($datos) ? $muestra->id == $datos->muestra_id ? 'selected' : '' : ''}}>{{ $muestra->muestra }}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

    <div class="col-xl-6 col-md-6 col-12">
        <fieldset class="form-group">
            <label for="descripcion">Descripción <i style="color: red">*</i></label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"  placeholder="Descripción">
                {{ isset($datos) ? $datos->descripcion : '' }}
            </textarea>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    <div class="col-xl-6 col-md-6 col-12">
        <fieldset class="form-group">
            <label for="informacion_clinica">Información clinica <i style="color: red">*</i></label>
            <textarea class="form-control @error('informacion_clinica') is-invalid @enderror" name="informacion_clinica"  placeholder="Información Clinica">
                {{ isset($datos) ? $datos->informacion_clinica : '' }}
            </textarea>
            @error('informacion_clinica')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    
    <div class="col-xl-12 col-md-12 col-12">
        <a href="{{ route('studies.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
        <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
    </div>
</div>