<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos de estudios</div>
      </div>
  </div>

  <div class="col-6 mb-1">
      <fieldset class="form-group">
          <input type="hidden" id="id-ficha">
          <label for="especialidad">Nombre</label>
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
        <input type="hidden" id="id-ficha">
        <label for="especialidad">Fecha inicio</label>
        <input type="text" id="input-fecha-inicio" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
</div>

  <div class="col-xl-12 col-md-12 col-12">
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

  <div class="col-12 mb-2">
    <div class="border rounded p-2">
      <h4 class="mb-1">Video</h4>
      <div class="media flex-column flex-md-row">
        <img
          src="{{asset('images/slider/03.jpg')}}"
          id="blog-feature-image"
          class="rounded mr-2 mb-1 mb-md-0"
          width="170"
          height="110"
          alt="Blog Featured Image"
        />
        <div class="media-body">
          {{--  <h5 class="mb-0">Requiere video max 10mb</h5>  --}}
          <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
          <p class="my-50">
            <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
          </p>
          <div class="d-inline-block">
            <div class="form-group mb-0">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="blogCustomFile" accept="video/*" />
                <label class="custom-file-label" for="blogCustomFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Preview</div>
    </div>
  </div>

  <div class="col-12 mb-2">
    <div class="border rounded p-2">
      <h4 class="mb-1">Portada</h4>
      <div class="media flex-column flex-md-row">
        <img
          src="{{asset('images/slider/03.jpg')}}"
          id="blog-feature-image"
          class="rounded mr-2 mb-1 mb-md-0"
          width="170"
          height="110"
          alt="Blog Featured Image"
        />
        <div class="media-body">
          {{--  <h5 class="mb-0">Requiere video max 10mb</h5>  --}}
          <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
          <p class="my-50">
            <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
          </p>
          <div class="d-inline-block">
            <div class="form-group mb-0">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="blogCustomFile" accept="video/*" />
                <label class="custom-file-label" for="blogCustomFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 mb-2">
    <div class="border rounded p-2">
      <h4 class="mb-1">Video</h4>
      <div class="media flex-column flex-md-row">
        <img
          src="{{asset('images/slider/03.jpg')}}"
          id="blog-feature-image"
          class="rounded mr-2 mb-1 mb-md-0"
          width="170"
          height="110"
          alt="Blog Featured Image"
        />
        <div class="media-body">
          {{--  <h5 class="mb-0">Requiere video max 10mb</h5>  --}}
          <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
          <p class="my-50">
            <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
          </p>
          <div class="d-inline-block">
            <div class="form-group mb-0">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="blogCustomFile" accept="video/*" />
                <label class="custom-file-label" for="blogCustomFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
        <input type="text" id="input-nombre-especialidad" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-12 mb-2">
    <div class="border rounded p-2">
      <h4 class="mb-1">Foto</h4>
      <div class="media flex-column flex-md-row">
        <img
          src="{{asset('images/slider/03.jpg')}}"
          id="blog-feature-image"
          class="rounded mr-2 mb-1 mb-md-0"
          width="170"
          height="110"
          alt="Blog Featured Image"
        />
        <div class="media-body">
          {{--  <h5 class="mb-0">Requiere video max 10mb</h5>  --}}
          <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
          <p class="my-50">
            <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
          </p>
          <div class="d-inline-block">
            <div class="form-group mb-0">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="blogCustomFile" accept="video/*" />
                <label class="custom-file-label" for="blogCustomFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('webinar.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>