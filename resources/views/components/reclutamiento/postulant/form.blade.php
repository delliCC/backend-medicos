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
  @foreach ($datos->familiares as $familiar)
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="nombre">Nombre Completo</label>
          <input type="hidden" value="{{$familiar->id}}" id="familiar_id">
          <input type="text" id="nombre" value="{{ old('nombre', isset($datos) ? $familiar->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre">
          @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="parentesco">Vive Parentesco</label>
          <select class="form-control"  class="form-control" name="parentesco" id="parentesco">
            <option {{isset($datos) ? $datos->parentesco == 'mama' ? 'selected' : '' : ''}}>Mamá</option>
            <option {{isset($datos) ? $datos->parentesco == 'papa' ? 'selected' : '' : ''}}>Papá</option>
            <option {{isset($datos) ? $datos->parentesco == 'conyuge' ? 'selected' : '' : ''}}>Conyuge</option>
            <option {{isset($datos) ? $datos->parentesco == 'hijo' ? 'selected' : '' : ''}}>Hijo</option>
            <option {{isset($datos) ? $datos->parentesco == 'hija' ? 'selected' : '' : ''}}>Hija</option>
            <option {{isset($datos) ? $datos->parentesco == 'hermano' ? 'selected' : '' : ''}}>Hermano</option>
            <option {{isset($datos) ? $datos->parentesco == 'hermana' ? 'selected' : '' : ''}}>Hermana</option>
            <option {{isset($datos) ? $datos->parentesco == 'abuelo' ? 'selected' : '' : ''}}>Abuelo</option>
            <option {{isset($datos) ? $datos->parentesco == 'abuela' ? 'selected' : '' : ''}}>Abuela</option>
          </select>
          @error('parentesco')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="vive">Vive</label>
          <select class="form-control"  class="form-control" name="vive" id="vive">
            <option {{isset($datos) ? $datos->vive == 'si' ? 'selected' : '' : ''}}>Si</option>
            <option {{isset($datos) ? $datos->vive == 'no' ? 'selected' : '' : ''}}>No</option>
          </select>
          @error('vive_con')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="ocupacion">Ocupación</label>
          <input type="text" id="ocupacion" value="{{ old('ocupacion', isset($datos) ? $familiar->ocupacion : '') }}" class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion">
          @error('ocupacion')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="edad">Edad</label>
          <input type="text" id="edad" value="{{ old('edad', isset($datos) ? $familiar->edad : '') }}" class="form-control @error('edad') is-invalid @enderror" name="edad">
          @error('edad')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="text" id="telefono" value="{{ old('telefono', isset($datos) ? $familiar->telefono : '') }}" class="form-control @error('telefono') is-invalid @enderror" name="telefono">
          @error('telefono')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-xl-12 col-md-12 col-12">
      <fieldset class="form-group">
          <label for="domicilio">Dirección <i style="color: red">*</i></label>
          <textarea class="form-control @error('domicilio') is-invalid @enderror" id="domicilio" name="domicilio">{{ isset($datos) ? $familiar->domicilio : '' }}</textarea>
          @error('domicilio')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
  
  @endforeach
  
  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos Escolares</div>
    </div>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="ultimo_grado_estudios">Último Grado de Estudios</label>
        <input type="text" id="ultimo_grado_estudios" value="{{ old('ultimo_grado_estudios', isset($datos) ? $datos->ultimo_grado_estudios : '') }}" class="form-control @error('ultimo_grado_estudios') is-invalid @enderror" name="ultimo_grado_estudios">
        @error('ultimo_grado_estudios')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="institucion">Institución </label>
        <input type="text" id="institucion" value="{{ old('institucion', isset($datos) ? $datos->institucion : '') }}" class="form-control @error('institucion') is-invalid @enderror" name="institucion">
        @error('institucion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="especialidad">Especialidad </label>
        <input type="text" id="especialidad" value="{{ old('especialidad', isset($datos) ? $datos->especialidad : '') }}" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad">
        @error('especialidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="certificado">Certificado </label>
        <select class="form-control"  class="form-control" name="certificado" id="certificado">
          <option {{isset($datos) ? $datos->certificado == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->certificado == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('certificado')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="titulo">Título </label>
        <select class="form-control"  class="form-control" name="titulo" id="titulo" onclick="activarEscolaridad(this)">
          <option {{isset($datos) ? $datos->titulo == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->titulo == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('titulo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1" id="campoEscolarCedula" style="display:none">
    <fieldset class="form-group">
        <label for="cedula">Cédula </label>
        <select class="form-control"  class="form-control" name="cedula" id="cedula">
          <option {{isset($datos) ? $datos->cedula == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->cedula == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('cedula')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1" id="campoEscolarTrunco" style="display:none">
    <fieldset class="form-group">
        <label for="trunco">Trunco </label>
        <select class="form-control"  class="form-control" name="trunco" id="trunco">
          <option {{isset($datos) ? $datos->trunco == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->trunco == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('trunco')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="estudia_actualmente">Estudias Actualmente </label>
        <select class="form-control"  class="form-control" name="estudia_actualmente" id="estudia_actualmente" onclick="activarEscolaridad(this)">
          <option {{isset($datos) ? $datos->estudia_actualmente == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->estudia_actualmente == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('estudia_actualmente')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1" id="campoInstitucion" style="display: none;">
    <fieldset class="form-group">
        <label for="institucion_actual">Institución Actual </label>
        <input type="text" id="institucion_actual" value="{{ old('institucion_actual', isset($datos) ? $datos->institucion_actual : '') }}" class="form-control @error('institucion_actual') is-invalid @enderror" name="institucion_actual">
        @error('institucion_actual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1" id="campoCarrera" style="display: none;">
    <fieldset class="form-group">
        <label for="carrera_actual">Carrera </label>
        <input type="text" id="carrera_actual" value="{{ old('carrera_actual', isset($datos) ? $datos->carrera_actual : '') }}" class="form-control @error('carrera_actual') is-invalid @enderror" name="carrera_actual">
        @error('carrera_actual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1" id="campoSemestre" style="display: none;">
    <fieldset class="form-group">
        <label for="semestre_actual">Semestre </label>
        <input type="text" id="semestre_actual" value="{{ old('semestre_actual', isset($datos) ? $datos->semestre_actual : '') }}" class="form-control @error('semestre_actual') is-invalid @enderror" name="semestre_actual">
        @error('semestre_actual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1" id="campoHorario" style="display: none;">
    <fieldset class="form-group">
        <label for="horario_actual">Horario </label>
        <input type="text" id="horario_actual" value="{{ old('horario_actual', isset($datos) ? $datos->horario_actual : '') }}" class="form-control @error('horario_actual') is-invalid @enderror" name="horario_actual">
        @error('horario_actual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Conocimientos Generales</div>
    </div>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="maquina_software">Lenguaje que Dominas </label>
        <input type="text" id="idiomas" value="{{ old('idiomas', isset($datos) ? $datos->idiomas : '') }}" class="form-control @error('idiomas') is-invalid @enderror" name="idiomas">
        @error('idiomas')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="maquina_software">Maquina o Software de Oficina que dominas </label>
        <textarea class="form-control @error('maquina_software') is-invalid @enderror" id="maquina_software" name="maquina_software">{{ isset($datos) ? $datos->maquina_software : '' }}</textarea>
        @error('maquina_software')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="oficios_domines">Otros Trabajos o Oficios que Domines </label>
        <textarea class="form-control @error('oficios_domines') is-invalid @enderror" id="oficios_domines" name="oficios_domines">{{ isset($datos) ? $datos->oficios_domines : '' }}</textarea>
        @error('oficios_domines')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="datos_manejo">En caso de saber conducir, Indique el tipo de unidad que ha manejado </label>
        <textarea class="form-control @error('datos_manejo') is-invalid @enderror" id="datos_manejo" name="datos_manejo">{{ isset($datos) ? $datos->datos_manejo : '' }}</textarea>
        @error('datos_manejo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Referencias Personales</div>
    </div>
  </div>

  @foreach ($datos->referencias as $referencia)
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="nombre">Nombre Completo</label>
          <input type="hidden" value="{{$referencia->id}}" id="familiar_id">
          <input type="text" id="nombre" value="{{ old('nombre', isset($datos) ? $referencia->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre">
          @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="ocupacion">Ocupación</label>
          <input type="text" id="ocupacion" value="{{ old('ocupacion', isset($datos) ? $referencia->ocupacion : '') }}" class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion">
          @error('ocupacion')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="edad">Edad</label>
          <input type="text" id="edad" value="{{ old('edad', isset($datos) ? $referencia->edad : '') }}" class="form-control @error('edad') is-invalid @enderror" name="edad">
          @error('edad')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="text" id="telefono" value="{{ old('telefono', isset($datos) ? $referencia->telefono : '') }}" class="form-control @error('telefono') is-invalid @enderror" name="telefono">
          @error('telefono')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-xl-8 col-md-12 col-12">
      <fieldset class="form-group">
          <label for="domicilio">Dirección <i style="color: red">*</i></label>
          <textarea class="form-control @error('domicilio') is-invalid @enderror" id="domicilio" name="domicilio">{{ isset($datos) ? $referencia->domicilio : '' }}</textarea>
          @error('domicilio')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
  @endforeach

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Trayectoria Laboral</div>
    </div>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos Generales</div>
    </div>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos Económicos</div>
    </div>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Documentos</div>
    </div>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('postulant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>