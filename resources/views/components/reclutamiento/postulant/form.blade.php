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

  <div class="col-4 mb-1">
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

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre">
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="apellido_paterno">Apellido Paterno</label>
        <input type="text" id="apellido_paterno" value="{{ old('apellido_paterno', isset($datos) ? $datos->apellido_paterno : '') }}" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno">
        @error('apellido_paterno')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="apellido_materno">Apellido Materno</label>
        <input type="text" id="apellido_materno" value="{{ old('apellido_materno', isset($datos) ? $datos->apellido_materno : '') }}" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno">
        @error('apellido_materno')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-2 mb-1">
    <fieldset class="form-group">
      <label for="sexo">Sexo</label>
      <select class="form-control"  class="form-control" name="sexo" id="sexo">
        <option {{isset($datos) ? $datos->sexo == 'masculino' ? 'selected' : '' : ''}}>Masculino</option>
        <option {{isset($datos) ? $datos->sexo == 'femenino' ? 'selected' : '' : ''}}>Femenino</option>
      </select>
      @error('sexo')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </fieldset>
  </div>

  <div class="col-2 mb-1">
    <fieldset class="form-group">
        <label for="edad">Edad</label>
        <input type="text" id="edad" value="{{ old('edad', isset($datos) ? $datos->edad : '') }}" class="form-control @error('edad') is-invalid @enderror" name="edad">
        @error('edad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="lugar_nacimiento">Lugar de Nacimiento</label>
        <input type="text" id="lugar_nacimiento" value="{{ old('lugar_nacimiento', isset($datos) ? $datos->lugar_nacimiento : '') }}" class="form-control @error('lugar_nacimiento') is-invalid @enderror" name="lugar_nacimiento">
        @error('lugar_nacimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
      <label for="fecha_nacimiento">Fecha de Postulacion</label>
        <input type="date" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', isset($datos) ? $datos->fecha_nacimiento : '') }}" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento">
        @error('fecha_nacimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="lugar_nacimiento">Lugar de Nacimiento</label>
        <input type="text" id="lugar_nacimiento" value="{{ old('lugar_nacimiento', isset($datos) ? $datos->lugar_nacimiento : '') }}" class="form-control @error('lugar_nacimiento') is-invalid @enderror" name="lugar_nacimiento">
        @error('lugar_nacimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="curp">CURP</label>
        <input type="text" id="curp" value="{{ old('curp', isset($datos) ? $datos->curp : '') }}" class="form-control @error('curp') is-invalid @enderror" name="curp">
        @error('curp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="rfc">RFC</label>
        <input type="text" id="rfc" value="{{ old('rfc', isset($datos) ? $datos->rfc : '') }}" class="form-control @error('rfc') is-invalid @enderror" name="rfc">
        @error('rfc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="numero_social">Numero de Seguro Social</label>
        <input type="text" id="numero_social" value="{{ old('numero_social', isset($datos) ? $datos->numero_social : '') }}" class="form-control @error('numero_social') is-invalid @enderror" name="numero_social">
        @error('numero_social')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="licencia_conducir">Licencia de Conducir</label>
        <select class="form-control"  class="form-control" name="licencia_conducir" id="licencia_conducir">
          <option {{isset($datos) ? $datos->licencia_conducir == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->licencia_conducir == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('licencia_conducir')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="cartilla">Cartilla Militar</label>
        <input type="text" id="cartilla" value="{{ old('cartilla', isset($datos) ? $datos->cartilla : '') }}" class="form-control @error('cartilla') is-invalid @enderror" name="cartilla">
        @error('cartilla')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" value="{{ old('telefono', isset($datos) ? $datos->telefono : '') }}" class="form-control @error('telefono') is-invalid @enderror" name="telefono">
        @error('telefono')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" value="{{ old('telefono', isset($datos) ? $datos->telefono : '') }}" class="form-control @error('telefono') is-invalid @enderror" name="telefono">
        @error('telefono')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="correo">Correo electrónico</label>
        <input type="text" id="correo" value="{{ old('correo', isset($datos) ? $datos->correo : '') }}" class="form-control @error('correo') is-invalid @enderror" name="correo">
        @error('correo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="estado_civil">Estado civil</label>
        <select class="form-control"  class="form-control" name="estado_civil" id="estado_civil">
          <option {{isset($datos) ? $datos->estado_civil == 'soltero' ? 'selected' : '' : ''}}>Soltero</option>
          <option {{isset($datos) ? $datos->estado_civil == 'casado' ? 'selected' : '' : ''}}>Casado</option>
        </select>
        @error('estado_civil')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="vive_con">Vive con</label>
        <select class="form-control"  class="form-control" name="vive_con" id="vive_con">
          <option {{isset($datos) ? $datos->vive_con == 'padres' ? 'selected' : '' : ''}}>Padres</option>
          <option {{isset($datos) ? $datos->vive_con == 'familia' ? 'selected' : '' : ''}}>Familia</option>
          <option {{isset($datos) ? $datos->vive_con == 'parientes' ? 'selected' : '' : ''}}>Parientes</option>
          <option {{isset($datos) ? $datos->vive_con == 'solo' ? 'selected' : '' : ''}}>Solo</option>
        </select>
        @error('vive_con')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  {{--  <div class="col-xl-6 col-md-12 col-12">
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
      <small class="text-muted"> El tamaño máximo de archivo es de 250 GB.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input type="file" class="custom-file-input" id="input-fichaIndica" style="z-index: -5;" accept="application/pdf">
        <label data-browse="Browse" class="custom-file-label" for="input-fichaIndica">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>  --}}

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('postulant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>