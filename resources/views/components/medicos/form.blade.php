<div class="row">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="divider divider-left  divider-success">
            <div class="divider-text">Datos del Médico</div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="nombre">Nombre <i style="color: red">*</i></label>
            <input type="text" value="{{ old('nombre', isset($medico) ? $medico->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
            @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="apellido_paterno">Apellido Paterno <i style="color: red">*</i></label>
            <input type="text" value="{{ old('apellido_paterno', isset($medico) ? $medico->apellido_paterno : '') }}" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno"  placeholder="Apellido paterno">
            @error('apellido_paterno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="apellido_materno">Apellido Materno <i style="color: red">*</i></label>
            <input type="text" value="{{ old('apellido_materno', isset($medico) ? $medico->apellido_materno : '') }}" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno"  placeholder="Apellido materno">
            @error('apellido_materno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="correo">Correo <i style="color: red">*</i></label>
            <input type="email" value="{{ old('correo', isset($medico) ? $medico->correo : '') }}" class="form-control @error('correo') is-invalid @enderror" name="correo"  placeholder="Correo">
            @error('correo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="telefono">Teléfono <i style="color: red">*</i></label>
            <input type="tel" value="{{ old('telefono', isset($medico) ? $medico->telefono : '') }}" class="form-control @error('telefono') is-invalid @enderror" name="telefono"  placeholder="Teléfono">
            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="hospital_trabajo">Hospital</label>
            <input type="text" value="{{ old('hospital_trabajo', isset($medico) ? $medico->hospital_trabajo : '') }}" class="form-control @error('hospital_trabajo') is-invalid @enderror" name="hospital_trabajo"  placeholder="Hospital">
            @error('hospital_trabajo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="prefijo">Prefijo <i style="color: red">*</i></label>
            <input type="text" value="{{ old('prefijo', isset($medico) ? $medico->prefijo : '') }}" class="form-control @error('prefijo') is-invalid @enderror" name="prefijo"  placeholder="Prefijo">
            @error('prefijo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="tipo_medico">Médico</label>
            <select class="form-control"  class="form-control" name="tipo_medico">
                <option {{$medico->tipo_medico == 'General' ? 'selected' : ''}}>General</option>
                <option {{$medico->tipo_medico == 'Especialista' ? 'selected' : ''}}>Especialista</option>
            </select>
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="especialidad_id">Especialidad</label>
            <input type="tel" value="{{ old('especialidad_id', isset($medico) ? $medico->especialidad_id : '') }}" class="form-control @error('especialidad_id') is-invalid @enderror" name="especialidad_id"  placeholder="Especialidad">
            @error('especialidad_id')
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
            <input type="text" value="{{ old('pais', isset($medico) ? $medico->pais : '') }}" class="form-control @error('pais') is-invalid @enderror" name="pais"  placeholder="País">
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
            <input type="text" value="{{ old('estado', isset($medico) ? $medico->estado : '') }}" class="form-control @error('estado') is-invalid @enderror" name="estado"  placeholder="Estado">
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
            <input type="text" value="{{ old('municipio', isset($medico) ? $medico->municipio : '') }}" class="form-control @error('municipio') is-invalid @enderror" name="municipio"  placeholder="Municipio">
            @error('municipio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-12 col-md-12 col-12">
        <fieldset class="form-group">
            <label for="direccion">Dirección completa <i style="color: red">*</i></label>
            <textarea class="form-control @error('direccion') is-invalid @enderror" name="direccion"  placeholder="Dirección">
                {{ isset($medico) ? $medico->direccion : '' }}
            </textarea>
            @error('direccion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    
    <div class="col-xl-12 col-md-12 col-12">
        <a href="{{ route('medicos.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
        <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
    </div>
</div>