<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos del los postulantes</div>
      </div>
  </div>

  <div class="col-4 mb-1">
      <fieldset class="form-group">
        <input type="hidden" value="{{$datos->id}}" id="postulante_id">
          <label for="puesto_solicitado">Puesto Solicitado</label>
          <select class="form-control" class="form-control" id="puesto_solicitado" name="puesto_id">
            @foreach ($puestos as $puesto)
                <option value="{{$puesto->id}}" {{isset($datos) ? $puesto->id == $datos->vacantes->puesto_id ? 'selected' : '' : ''}}>
                    {{ $puesto->puesto }}
                </option>
            @endforeach
          </select>
          @error('puesto_solicitado')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="sucursal_id">Sucursal</label>
        <select class="form-control" class="form-control" id="sucursal_id" name="sucursal_id[]" multiple>
          @foreach ($sucursales as $sucursal)
              <option value="{{$sucursal->id}}" {{isset($datos) ? $sucursal->id == $datos->vacantes->sucursal_id ? 'selected' : '' : ''}}>
                  {{ $sucursal->sucursal }}
              </option>
          @endforeach
        </select>
        @error('sucursal_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
      <label for="fecha_postulacion">Fecha de Postulacion</label>
        <input type="date" id="fecha_postulacion" value="{{ old('fecha_postulacion', isset($datos) ? $datos->fecha_postulacion : '') }}" class="form-control @error('fecha_postulacion') is-invalid @enderror" name="fecha_postulacion">
        @error('fecha_postulacion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-6 mb-1">
    <fieldset class="form-group">
        <label for="sueldo_pretendido">Sueldo Pretendido Mensual</label>
        <input type="text" id="sueldo_pretendido" value="{{ old('sueldo_pretendido', isset($datos) ? $datos->sueldo_pretendido : '') }}" class="form-control @error('sueldo_pretendido') is-invalid @enderror" name="sueldo_pretendido">
        @error('sueldo_pretendido')
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
      <a href="{{ route('postulant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>