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
                {{--  <option {{isset($medico) ? $medico->tipo_medico == 'General' ? 'selected' : '' : ''}}>General</option>  --}}
            </select>
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="tipo_muestra">Tipo de Muestra</label>
            <select class="form-control"  class="form-control" name="muestra_id">
                @foreach ($tipoMuestra as $muestra)
                <option value="{{ $muestra->id }}">{{ $muestra->muestra }}</option>
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
            <textarea class="form-control @error('direccion') is-invalid @enderror" name="direccion"  placeholder="Dirección">
                {{ isset($datos) ? $datos->direccion : '' }}
            </textarea>
            @error('direccion')
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