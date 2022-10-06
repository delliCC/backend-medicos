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
{{--  
  @if ($datos->titulo == 'no')
      
  @endif  --}}

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
        <select class="form-control"  class="form-control" name="estudia_actualmente" id="estudia_actualmente" onchange="activarEstudios(this)">
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
  @foreach ($datos->trayectoria as $laboral)
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="empresa">Empresa</label>
          <input type="text" id="empresa" value="{{ old('empresa', isset($datos) ? $laboral->empresa : '') }}" class="form-control @error('empresa') is-invalid @enderror" name="empresa">
          @error('empresa')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
        <label for="fecha_ingreso">Fecha de Ingreso</label>
          <input type="date" id="fecha_ingreso" value="{{ old('fecha_ingreso', isset($datos) ? $laboral->fecha_ingreso : '') }}" class="form-control @error('fecha_ingreso') is-invalid @enderror" name="fecha_ingreso">
          @error('fecha_ingreso')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
        <label for="fecha_baja">Fecha de Baja</label>
          <input type="date" id="fecha_baja" value="{{ old('fecha_baja', isset($datos) ? $laboral->fecha_baja : '') }}" class="form-control @error('fecha_baja') is-invalid @enderror" name="fecha_baja">
          @error('fecha_baja')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="puesto">Puesto</label>
          <input type="text" id="puesto" value="{{ old('puesto', isset($datos) ? $laboral->puesto : '') }}" class="form-control @error('puesto') is-invalid @enderror" name="puesto">
          @error('puesto')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="sueldo_inicial">Sueldo Inicial</label>
          <input type="text" id="sueldo_inicial" value="{{ old('sueldo_inicial', isset($datos) ? $laboral->sueldo_inicial : '') }}" class="form-control @error('sueldo_inicial') is-invalid @enderror" name="sueldo_inicial">
          @error('sueldo_inicial')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="sueldo_final">Sueldo Final</label>
          <input type="text" id="sueldo_final" value="{{ old('sueldo_final', isset($datos) ? $laboral->sueldo_final : '') }}" class="form-control @error('sueldo_final') is-invalid @enderror" name="sueldo_final">
          @error('sueldo_final')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="dias_cobro">Días de cobro</label>
          <input type="text" id="dias_cobro" value="{{ old('dias_cobro', isset($datos) ? $laboral->dias_cobro : '') }}" class="form-control @error('dias_cobro') is-invalid @enderror" name="dias_cobro">
          @error('dias_cobro')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="pedir_referencia">¿Podemos pedir referencias? </label>
          <select class="form-control"  class="form-control" name="pedir_referencia" id="pedir_referencia">
            <option {{isset($datos) ? $laboral->pedir_referencia == 'si' ? 'selected' : '' : ''}}>Si</option>
            <option {{isset($datos) ? $laboral->pedir_referencia == 'no' ? 'selected' : '' : ''}}>No</option>
          </select>
          @error('pedir_referencia')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4">
      <fieldset class="form-group">
          <label for="select_carta">Carta de recomendación</label>
          <select class="form-control"  class="form-control" name="select_carta" id="select_carta">
            <option {{isset($datos) ? $laboral->select_carta == 'si' ? 'selected' : '' : ''}}>Si</option>
            <option {{isset($datos) ? $laboral->select_carta == 'no' ? 'selected' : '' : ''}}>No</option>
          </select>
          @error('select_carta')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4">
      <fieldset class="form-group">
          <label for="select_constancia">Constancia de Laboral </label>
          <select class="form-control"  class="form-control" name="select_constancia" id="select_constancia">
            <option {{isset($datos) ? $laboral->select_constancia == 'si' ? 'selected' : '' : ''}}>Si</option>
            <option {{isset($datos) ? $laboral->select_constancia == 'no' ? 'selected' : '' : ''}}>No</option>
          </select>
          @error('select_constancia')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4">
      <fieldset class="form-group">
          <label for="motivo_salida">Motivo de Salida </label>
          <select class="form-control"  class="form-control" name="motivo_salida" id="motivo_salida"
            onchange="activarMotivoSalida()">
            <option {{isset($datos) ? $laboral->renuncia == 'renuncia' ? 'selected' : '' : ''}}>Renuncia Voluntaria</option>
            <option {{isset($datos) ? $laboral->renudacion_estudios == 'renudacion_estudios' ? 'selected' : '' : ''}}>Reanudación de  estudios</option>
            <option {{isset($datos) ? $laboral->horarios == 'horarios' ? 'selected' : '' : ''}}>Horarios</option>
            <option {{isset($datos) ? $laboral->salario == 'salario' ? 'selected' : '' : ''}}>Salario</option>
            <option {{isset($datos) ? $laboral->problemas_salud == 'problemas_salud' ? 'selected' : '' : ''}}>Problemas de Salud</option>
            <option {{isset($datos) ? $laboral->otros == 'otros' ? 'selected' : '' : ''}}>Otros</option>
          </select>
          @error('motivo_salida')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-xl-8 col-md-4 col-12" id="campoMotivoCual" style="display:none">
      <fieldset class="form-group">
          <label for="otro_motivo_salida">Cuál <i style="color: red">*</i></label>
          <textarea class="form-control @error('otro_motivo_salida') is-invalid @enderror" id="otro_motivo_salida" name="otro_motivo_salida">{{ isset($datos) ? $laboral->otro_motivo_salida : '' }}</textarea>
          @error('otro_motivo_salida')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-xl-12 col-md-12 col-12">
      <fieldset class="form-group">
          <label for="domicilio_empresa">Domicilio <i style="color: red">*</i></label>
          <textarea class="form-control @error('domicilio_empresa') is-invalid @enderror" id="domicilio_empresa" name="domicilio_empresa">{{ isset($datos) ? $laboral->domicilio_empresa : '' }}</textarea>
          @error('domicilio_empresa')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="jefe">Nombre completo del Jefe Inmediato </label>
          <input type="text" id="jefe" value="{{ old('jefe', isset($datos) ? $laboral->jefe : '') }}" class="form-control @error('jefe') is-invalid @enderror" name="jefe">
          @error('jefe')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="puesto_jefe">Puesto </label>
          <input type="text" id="puesto_jefe" value="{{ old('puesto_jefe', isset($datos) ? $laboral->puesto_jefe : '') }}" class="form-control @error('puesto_jefe') is-invalid @enderror" name="puesto_jefe">
          @error('puesto_jefe')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>

    <div class="col-4 mb-1">
      <fieldset class="form-group">
          <label for="telefono_jefe">Teléfono </label>
          <input type="text" id="telefono_jefe" value="{{ old('telefono_jefe', isset($datos) ? $laboral->telefono_jefe : '') }}" class="form-control @error('telefono_jefe') is-invalid @enderror" name="telefono_jefe">
          @error('telefono_jefe')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </fieldset>
    </div>
  @endforeach

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos Generales</div>
    </div>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="como_entero">¿Como se entero de la oferta del empleo?  </label>
        <select class="form-control"  class="form-control" name="como_entero" id="como_entero">
          <option {{isset($datos) ? $datos->como_entero == 'internet' ? 'selected' : '' : ''}}>Internet</option>
          <option {{isset($datos) ? $datos->como_entero == 'publicidad' ? 'selected' : '' : ''}}>Publicidad</option>
          <option {{isset($datos) ? $datos->como_entero == 'perifoneo' ? 'selected' : '' : ''}}>Perifoneo</option>
          <option {{isset($datos) ? $datos->como_entero == 'estatal_empleo' ? 'selected' : '' : ''}}>Estatal del Empleo</option>
          <option {{isset($datos) ? $datos->como_entero == 'periodico' ? 'selected' : '' : ''}}>Periodico</option>
          <option {{isset($datos) ? $datos->como_entero == 'redes_sociales' ? 'selected' : '' : ''}}>Redes Sociales</option>
          <option {{isset($datos) ? $datos->como_entero == 'lonas' ? 'selected' : '' : ''}}>Lonas</option>
          <option {{isset($datos) ? $datos->como_entero == 'feria_empleo' ? 'selected' : '' : ''}}>Feria del Empleo</option>
          <option {{isset($datos) ? $datos->como_entero == 'universidad' ? 'selected' : '' : ''}}>Universidad</option>
          <option {{isset($datos) ? $datos->como_entero == 'volantes' ? 'selected' : '' : ''}}>Volantes</option>
          <option {{isset($datos) ? $datos->como_entero == 'contacto' ? 'selected' : '' : ''}}>Contactos</option>
          <option {{isset($datos) ? $datos->como_entero == 'otros' ? 'selected' : '' : ''}}>Otros</option>
        </select>
        @error('como_entero')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="otros_entero">Otros </label>
        <input type="text" id="otros_entero" value="{{ old('otros_entero', isset($datos) ? $datos->otros_entero : '') }}" class="form-control @error('otros_entero') is-invalid @enderror" name="otros_entero">
        @error('otros_entero')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="select_constancia">¿Tiene Parientes trabajando en esta empresa? </label>
        <select class="form-control"  class="form-control" name="select_constancia" id="select_constancia">
          <option {{isset($datos) ? $datos->select_constancia == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->select_constancia == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('select_constancia')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="otros_entero">Otros</label>
        <input type="text" id="otros_entero" value="{{ old('otros_entero', isset($datos) ? $datos->otros_entero : '') }}" class="form-control @error('otros_entero') is-invalid @enderror" name="otros_entero">
        @error('otros_entero')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="parientes">¿Tiene Parientes trabajando en esta empresa? </label>
        <select class="form-control"  class="form-control" name="parientes" id="parientes">
          <option {{isset($datos) ? $datos->parientes == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->parientes == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('parientes')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="parientes_nombre">Nombre completo del pariente</label>
        <input type="text" id="parientes_nombre" value="{{ old('parientes_nombre', isset($datos) ? $datos->parientes_nombre : '') }}" class="form-control @error('parientes_nombre') is-invalid @enderror" name="parientes_nombre">
        @error('parientes_nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="afianzado">¿Ha estado afianzado? </label>
        <select class="form-control"  class="form-control" name="afianzado" id="afianzado">
          <option {{isset($datos) ? $datos->afianzado == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->afianzado == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('afianzado')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="nombre_cia">Nombre de la CIA</label>
        <input type="text" id="nombre_cia" value="{{ old('nombre_cia', isset($datos) ? $datos->nombre_cia : '') }}" class="form-control @error('nombre_cia') is-invalid @enderror" name="nombre_cia">
        @error('nombre_cia')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="sindicato">¿Ha estado afiliado en algún sindicato?</label>
        <select class="form-control"  class="form-control" name="sindicato" id="sindicato">
          <option {{isset($datos) ? $datos->sindicato == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->sindicato == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('sindicato')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="nombre_sindicato">¿A cuál?</label>
        <input type="text" id="nombre_sindicato" value="{{ old('nombre_sindicato', isset($datos) ? $datos->nombre_sindicato : '') }}" class="form-control @error('nombre_sindicato') is-invalid @enderror" name="nombre_sindicato">
        @error('nombre_sindicato')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="seguro">¿Tiene seguro de vida?</label>
        <select class="form-control"  class="form-control" name="seguro" id="seguro">
          <option {{isset($datos) ? $datos->seguro == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->seguro == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('seguro')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="nombre_seguro">Nombre del seguro</label>
        <input type="text" id="nombre_seguro" value="{{ old('nombre_seguro', isset($datos) ? $datos->nombre_seguro : '') }}" class="form-control @error('nombre_seguro') is-invalid @enderror" name="nombre_seguro">
        @error('nombre_seguro')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="viajar">¿Puede Viajar? </label>
        <select class="form-control"  class="form-control" name="viajar" id="viajar">
          <option {{isset($datos) ? $datos->viajar == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->viajar == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('viajar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="razones_viajar">Razones</label>
        <input type="text" id="razones_viajar" value="{{ old('razones_viajar', isset($datos) ? $datos->razones_viajar : '') }}" class="form-control @error('razones_viajar') is-invalid @enderror" name="razones_viajar">
        @error('razones_viajar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="residencia">¿Está dispuesto a cambiar su lugar de residencia? </label>
        <select class="form-control"  class="form-control" name="residencia" id="residencia">
          <option {{isset($datos) ? $datos->residencia == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->residencia == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('residencia')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="razones_residencia">Razones</label>
        <input type="text" id="razones_residencia" value="{{ old('razones_residencia', isset($datos) ? $datos->razones_residencia : '') }}" class="form-control @error('razones_residencia') is-invalid @enderror" name="razones_residencia">
        @error('razones_residencia')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="espera_oferta_laboral">¿Esta en espera de alguna oferta laboral? </label>
        <select class="form-control"  class="form-control" name="espera_oferta_laboral" id="espera_oferta_laboral">
          <option {{isset($datos) ? $datos->espera_oferta_laboral == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->espera_oferta_laboral == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('espera_oferta_laboral')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="fecha_trabajar">Fecha en que podria presentarse a trabajar</label>
        <select class="form-control"  class="form-control" name="fecha_trabajar" id="fecha_trabajar">
          <option {{isset($datos) ? $datos->fecha_trabajar == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->fecha_trabajar == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('fecha_trabajar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Datos Económicos</div>
    </div>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="otro_ingreso">¿Tiene usted otros ingresos?</label>
        <select class="form-control"  class="form-control" name="otro_ingreso" id="otro_ingreso">
          <option {{isset($datos) ? $datos->otro_ingreso == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->otro_ingreso == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('otro_ingreso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="importe_mensual">Importe mensual</label>
        <input type="text" id="importe_mensual" value="{{ old('importe_mensual', isset($datos) ? $datos->importe_mensual : '') }}" class="form-control @error('importe_mensual') is-invalid @enderror" name="importe_mensual">
        @error('importe_mensual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="cual_ingreso">Cuál <i style="color: red">*</i></label>
        <textarea class="form-control @error('cual_ingreso') is-invalid @enderror" id="cual_ingreso" name="cual_ingreso">{{ isset($datos) ? $datos->cual_ingreso : '' }}</textarea>
        @error('cual_ingreso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="conyuge_trabaja">¿Su conyuge trabaja?</label>
        <select class="form-control"  class="form-control" name="conyuge_trabaja" id="conyuge_trabaja">
          <option {{isset($datos) ? $datos->conyuge_trabaja == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->conyuge_trabaja == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('conyuge_trabaja')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="importe_conyuge">Importe mensual</label>
        <input type="text" id="importe_conyuge" value="{{ old('importe_conyuge', isset($datos) ? $datos->importe_conyuge : '') }}" class="form-control @error('importe_conyuge') is-invalid @enderror" name="importe_conyuge">
        @error('importe_conyuge')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="conyuge_donde">Dónde <i style="color: red">*</i></label>
        <textarea class="form-control @error('conyuge_donde') is-invalid @enderror" id="conyuge_donde" name="conyuge_donde">{{ isset($datos) ? $datos->conyuge_donde : '' }}</textarea>
        @error('conyuge_donde')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="paga_renta">¿Paga renta?</label>
        <select class="form-control"  class="form-control" name="paga_renta" id="paga_renta">
          <option {{isset($datos) ? $datos->paga_renta == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->paga_renta == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('paga_renta')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="importe_renta">Importe mensual</label>
        <input type="text" id="importe_renta" value="{{ old('importe_renta', isset($datos) ? $datos->importe_renta : '') }}" class="form-control @error('importe_renta') is-invalid @enderror" name="importe_renta">
        @error('importe_renta')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="casa_propia">¿Vive en casa propia? </label>
        <select class="form-control"  class="form-control" name="casa_propia" id="casa_propia">
          <option {{isset($datos) ? $datos->casa_propia == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->casa_propia == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('casa_propia')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="auto_propio">¿Tiene automovil propio? </label>
        <select class="form-control"  class="form-control" name="auto_propio" id="auto_propio">
          <option {{isset($datos) ? $datos->auto_propio == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->auto_propio == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('auto_propio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="marca">Marca</label>
        <input type="text" id="marca" value="{{ old('marca', isset($datos) ? $datos->marca : '') }}" class="form-control @error('marca') is-invalid @enderror" name="marca">
        @error('marca')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text" id="modelo" value="{{ old('modelo', isset($datos) ? $datos->modelo : '') }}" class="form-control @error('modelo') is-invalid @enderror" name="modelo">
        @error('modelo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4">
    <fieldset class="form-group">
        <label for="deudas">¿Tiene deudas? </label>
        <select class="form-control"  class="form-control" name="deudas" id="deudas">
          <option {{isset($datos) ? $datos->deudas == 'si' ? 'selected' : '' : ''}}>Si</option>
          <option {{isset($datos) ? $datos->deudas == 'no' ? 'selected' : '' : ''}}>No</option>
        </select>
        @error('deudas')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="importe_deuda">Importe</label>
        <input type="text" id="importe_deuda" value="{{ old('importe_deuda', isset($datos) ? $datos->importe_deuda : '') }}" class="form-control @error('importe_deuda') is-invalid @enderror" name="importe_deuda">
        @error('importe_deuda')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="abono_mensual">¿Cuanto abona mensualmente?</label>
        <input type="text" id="abono_mensual" value="{{ old('abono_mensual', isset($datos) ? $datos->abono_mensual : '') }}" class="form-control @error('abono_mensual') is-invalid @enderror" name="abono_mensual">
        @error('abono_mensual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="gasto_mensual">Gastos mensuales </label>
        <input type="text" id="gasto_mensual" value="{{ old('gasto_mensual', isset($datos) ? $datos->gasto_mensual : '') }}" class="form-control @error('gasto_mensual') is-invalid @enderror" name="gasto_mensual">
        @error('gasto_mensual')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
    <div class="divider divider-left  divider-success">
        <div class="divider-text">Documentos</div>
    </div>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <label for="input-imagen">CV</label>
      <small class="text-muted"> El tamaño máximo de archivo es de 1M.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input name="imagen" type="file" class="custom-file-input" id="input-imagen" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="input-imagen">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-6 mb-2">
    <fieldset class="form-group">
      <label for="input-imagen">Carta de recomendación</label>
      <small class="text-muted"> El tamaño máximo de archivo es de 1M.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input name="imagen" type="file" class="custom-file-input" id="input-imagen" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="input-imagen">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div> 

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('postulant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>