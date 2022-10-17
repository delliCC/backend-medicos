<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos de la capacitación</div>
      </div>
  </div>

  <div class="col-6 mb-1">
      <fieldset class="form-group">
          <input type="hidden" id="training_id">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
          @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
  </div>

  <div class="col-6 mb-1">
    <fieldset class="form-group">
        <label for="fecha_inicio">Fecha inicio</label>
        <input type="datetime-local" id="fecha_inicio" value="{{ old('nombre', isset($datos) ? $datos->fecha_inicio : '') }}" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio"  placeholder="fecha inicio">
        @error('fecha_inicio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
</div>

  <div class="col-xl-6 col-md-12 col-12">
      <fieldset class="form-group">
          <label for="descripcion">Descripción <i style="color: red">*</i></label>
          <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"  placeholder="Descripción">{{ isset($datos) ? $datos->descripcion : '' }}</textarea>@error('descripcion')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <h4 class="mb-1">capacitación</h4>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="training_url" style="z-index: -5;" accept="video/*">
        <label data-browse="Browse" class="custom-file-label" for="training_url">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Preview</div>
    </div>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <h4 class="mb-1">Portada</h4>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="imagen_portada" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="imagen_portada">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <h4 class="mb-1">Trailer</h4>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="trailer_url" style="z-index: -5;" accept="video/*">
        <label data-browse="Browse" class="custom-file-label" for="trailer_url">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos del médico</div>
    </div>
  </div>
  <div class="col-6 mb-1">
    <fieldset class="form-group">
        <label for="nombre_medico">Nombre</label>
        <input type="text" id="nombre_medico" value="{{ old('nombre_medico', isset($datos) ? $datos->nombre_medico : '') }}" class="form-control @error('nombre_medico') is-invalid @enderror" name="nombre_medico"  placeholder="Nombre">
        @error('nombre_medico')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-6 mb-1">
        <label for="especialidad">Especialidad</label>
        <input type="text" id="especialidad" value="{{ old('especialidad', isset($datos) ? $datos->especialidad : '') }}" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad"  placeholder="especialidad">
        @error('especialidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <h4 class="mb-1">Foto</h4>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="imagen_medico_url" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="imagen_medico_url">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('training.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>