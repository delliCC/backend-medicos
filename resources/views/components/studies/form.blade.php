<div class="row">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="divider divider-left  divider-success">
            <div class="divider-text">Datos de estudios</div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="nombre">Titulo <i style="color: red">*</i></label>
            <input type="text" value="{{ old('titulo', isset($datos) ? $datos->titulo : '') }}" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" placeholder="Titulo">
            @error('titulo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="metodo_id">Tipo de Método</label>
            <select class="form-control"  class="form-control" name="metodo_id[]" id="metodo_id" multiple>
                @foreach ($tipoMetodo as $metodo)
                    <option value="{{$metodo->id}}" {{isset($datos) ? $metodo->id == $datos->metodo_id ? 'selected' : '' : ''}}>{{ $metodo->metodo }}</option>
                @endforeach
            </select>
            @error('metodo_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="muestra_id">Tipo de Muestra</label>
            <select class="form-control" class="form-control" id="muestra_id" name="muestra_id[]" multiple>
                @foreach ($tipoMuestra as $muestra)
                    <option value="{{$muestra->id}}" {{isset($datos) ? $muestra->id == $datos->muestra_id ? 'selected' : '' : ''}}>
                        {{ $muestra->muestra }}
                    </option>
                @endforeach
            </select>
            @error('muestra_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-6 col-md-6 col-12">
        <fieldset class="form-group">
            <label for="descripcion">Descripción <i style="color: red">*</i></label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" placeholder="Descripción" id="descripcion">{{ isset($datos) ? $datos->descripcion : '' }}</textarea>
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
            <textarea class="form-control @error('informacion_clinica') is-invalid @enderror" name="informacion_clinica" placeholder="Información Clinica" id="informacion">{{ isset($datos) ? $datos->informacion_clinica : '' }}</textarea>
            @error('informacion_clinica')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-6 col-md-6 col-12">
        <fieldset class="form-group">
            <label for="precauciones">Precauciones <i style="color: red">*</i></label>
            <textarea class="form-control @error('precauciones') is-invalid @enderror" name="precauciones" placeholder="precauciones" id="precauciones">{{ isset($datos) ? $datos->precauciones : '' }}</textarea>
            @error('precauciones')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-6 mb-2">
      <fieldset class="form-group">
        <h4 class="mb-1">Imagen</h4>
        <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
        <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
          <input type="file" class="custom-file-input" id="input-imagen" name="imagen" style="z-index: -5;" accept="image/*">
          <label data-browse="Browse" class="custom-file-label" for="input-imagen">
            <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
        </div>
      </fieldset>
    </div>

    <div class="col-6 mb-2">
      <fieldset class="form-group">
        <h4 class="mb-1">Imagen destacada</h4>
        <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
        <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
          <input type="file" class="custom-file-input" id="input-imagen-destacada" name="imagen_destacada"style="z-index: -5;" accept="image/*">
          <label data-browse="Browse" class="custom-file-label" for="input-imagen-destacada">
            <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
        </div>
      </fieldset>
    </div>
    
    <div class="col-xl-12 col-md-12 col-12">
        <a href="{{ route('studies.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
        <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
    </div>
</div>