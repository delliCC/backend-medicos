<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos del los postulantes</div>
      </div>
  </div>

  <div class="col-6 mb-1">
      <fieldset class="form-group">
          <input type="hidden" id="id-webinar">
          <label for="input-nombre">Nombre</label>
          <input type="text" id="input-nombre" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
          @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
  </div>

  <div class="col-6 mb-1">
    <fieldset class="form-group">
        <label for="input-fecha-inicio">Fecha inicio</label>
        <input type="datetime-local" id="input-fecha-inicio" value="{{ old('nombre', isset($datos) ? $datos->fecha_inicio : '') }}" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio"  placeholder="fecha inicio">
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
          <textarea class="form-control @error('descripcion') is-invalid @enderror" id="input-descripcion" name="descripcion"  placeholder="Descripción">
              {{ isset($datos) ? $datos->descripcion : '' }}
          </textarea>
          @error('descripcion')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <h4 class="mb-1">Video</h4>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="input-videoWebinar" style="z-index: -5;" accept="video/*">
        <label data-browse="Browse" class="custom-file-label" for="input-videoWebinar">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Ficha Indica</div>
    </div>
  </div>

  <div class="col-6 mb-1">
    <fieldset class="form-group">
        <label for="input-fiha">Ficha</label>
        <input type="text" id="input-ficha" value="{{ old('ficha_nombre', isset($datos) ? $datos->ficha_nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="ficha_nombre"  placeholder="Nombre de la ficha">
        @error('ficha_nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <label for="input-fiha">Ficha indica</label>
      {{--  <h4 class="mb-1">Ficha indica</h4>  --}}
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="input-fichaIndica" style="z-index: -5;" accept="application/pdf">
        <label data-browse="Browse" class="custom-file-label" for="input-fichaIndica">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="ficha_descripcion">Descripción <i style="color: red">*</i></label>
        <textarea class="form-control @error('ficha_descripcion') is-invalid @enderror" id="ficha_descripcion" name="ficha_descripcion"  placeholder="Descripción">
            {{ isset($datos) ? $datos->ficha_descripcion : '' }}
        </textarea>
        @error('ficha_descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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
        <input type="file" class="custom-file-input" id="input-portada" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="input-portada">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <h4 class="mb-1">Trailer</h4>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="input-trailer" style="z-index: -5;" accept="video/*">
        <label data-browse="Browse" class="custom-file-label" for="input-trailer">
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
        <input type="hidden" id="id-ficha">
        <label for="especialidad">Nombre</label>
        <input type="text" id="input-nombre-medico" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-6 mb-1">
    <fieldset class="form-group">
        <input type="hidden" id="id-ficha">
        <label for="especialidad">Especialidad</label>
        <input type="text" id="input-especialidad" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
        @error('nombre')
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
        <input type="file" class="custom-file-input" id="input-foto" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="input-foto">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('webinar.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>