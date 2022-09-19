<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos de la vacante</div>
      </div>
  </div>

  <div class="col-4 mb-1">
      <fieldset class="form-group">
          <input type="hidden" id="id-webinar">
          <label for="input-nombre">Puesto</label>
          <input type="text" id="input-nombre" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
          @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="input-horario">Horario</label>
        <input type="text" id="input-horario" value="{{ old('nombre', isset($datos) ? $datos->horario : '') }}" class="form-control @error('horario') is-invalid @enderror" name="horario"  placeholder="horario">
        @error('horario')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="input-salario">Salario</label>
        <input type="text" id="input-salario" value="{{ old('nombre', isset($datos) ? $datos->salario : '') }}" class="form-control @error('salario') is-invalid @enderror" name="salario"  placeholder="salario">
        @error('salario')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="input-salario">Reclutador</label>
        <input type="text" id="input-salario" value="{{ old('nombre', isset($datos) ? $datos->salario : '') }}" class="form-control @error('salario') is-invalid @enderror" name="salario"  placeholder="salario">
        @error('salario')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-2">
    <fieldset class="form-group">
      <label for="input-salario">Imagen</label>
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="input-imagen" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="input-imagen">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="prestaciones">Prestaciones <i style="color: red">*</i></label>
        <textarea class="form-control @error('prestaciones') is-invalid @enderror" id="input-prestaciones" name="prestaciones"  placeholder="prestaciones">
            {{ isset($datos) ? $datos->prestaciones : '' }}
        </textarea>
        @error('prestaciones')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="requisitos">Requisitos <i style="color: red">*</i></label>
        <textarea class="form-control @error('requisitos') is-invalid @enderror" id="input-requisitos" name="requisitos"  placeholder="requisitos">
            {{ isset($datos) ? $datos->requisitos : '' }}
        </textarea>
        @error('requisitos')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="funcion">Función <i style="color: red">*</i></label>
        <textarea class="form-control @error('funcion') is-invalid @enderror" id="input-funcion" name="funcion"  placeholder="función">
            {{ isset($datos) ? $datos->funcion : '' }}
        </textarea>
        @error('funcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="lugar_trabajo">Lugar de trabajo <i style="color: red">*</i></label>
        <textarea class="form-control @error('lugar_trabajo') is-invalid @enderror" id="input-lugar_trabajo" name="lugar_trabajo"  placeholder="lugar de trabajo">
            {{ isset($datos) ? $datos->lugar_trabajo : '' }}
        </textarea>
        @error('lugar_trabajo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('vacant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>