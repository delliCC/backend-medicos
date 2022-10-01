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

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Dirección</div>
    </div>
  </div>

  <div class="col-xl-4 col-md-6 col-12">
    <fieldset class="form-group">
        <label for="pais">País <i style="color: red">*</i></label>
        <select class="form-control" name="pais" id="pais">
            <option value="mexico" >México</option>
        </select>
        @error('pais')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-4 col-md-6 col-12">
    <fieldset class="form-group">
        <label for="estado">Estado <i style="color: red">*</i></label>
        <select class="form-control"  name="estado" id="selectEstado" onchange="cargarMunicipio()">
            <option value=""> Selecciona una opción </option>
        </select>
        @error('estado')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-4 col-md-6 col-12">
    <fieldset class="form-group">
        <label for="municipio">Municipio <i style="color: red">*</i></label>
        <div class="form-group">
            <select class="select2-municipios form-control" name="municipio" id="select2-municipios">
                <option value="">Selecciona una opción</option>
            </select>
        </div>
        @error('municipio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="colonia">Colonia</label>
        <input type="text" id="colonia" value="{{ old('colonia', isset($datos) ? $datos->colonia : '') }}" class="form-control @error('colonia') is-invalid @enderror" name="colonia">
        @error('colonia')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="entre_calles">Entre Calles</label>
        <input type="text" id="entre_calles" value="{{ old('entre_calles', isset($datos) ? $datos->entre_calles : '') }}" class="form-control @error('entre_calles') is-invalid @enderror" name="entre_calles">
        @error('entre_calles')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-2 mb-1">
    <fieldset class="form-group">
        <label for="numero_casa">No. de Casa </label>
        <input type="text" id="numero_casa" value="{{ old('numero_casa', isset($datos) ? $datos->numero_casa : '') }}" class="form-control @error('numero_casa') is-invalid @enderror" name="numero_casa">
        @error('numero_casa')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-2 mb-1">
    <fieldset class="form-group">
        <label for="codigo_postal">Codigo Postal </label>
        <input type="text" id="codigo_postal" value="{{ old('codigo_postal', isset($datos) ? $datos->codigo_postal : '') }}" class="form-control @error('codigo_postal') is-invalid @enderror" name="codigo_postal">
        @error('codigo_postal')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="direccion">Dirección <i style="color: red">*</i></label>
        <textarea class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion">{{ isset($datos) ? $datos->direccion : '' }}</textarea>
        @error('direccion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos Familiares</div>
    </div>
  </div>


  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('postulant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>