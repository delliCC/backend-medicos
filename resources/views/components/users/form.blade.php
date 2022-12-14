<div class="modal-body">

    <div class="col-xl-12 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="tipo_user">Tipo Usuario</label>
            <select class="form-control"  class="form-control" name="tipo_user" id="tipo_user" onchange="verTipoUser()">
                <option value="medico">Medicos</option>
                <option value="empleado">Empleado</option>
            </select>
        </fieldset>
    </div>

    <div class="col-12 mb-1" id="campo_medicos" style="display: none">
        <fieldset class="form-group">
            <label for="medico_id">Médico</label>
            <select class="form-control" class="form-control" id="medico_id" name="medico_id">
                <option value="" selected disabled> Selecciona una opción </option>
                @foreach ($medicos as $medico)
                    <option {{isset($datos) ? $medico->id == $datos->medico_id ? 'selected' : '' : ''}}>
                        {{ $medico->nombre }} {{ $medico->apellido_paterno }} {{ $medico->apellido_materno }}
                    </option>
                @endforeach
            </select>
            @error('medico_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-12 mb-1" id="campo_empleados" style="display: none">
        <fieldset class="form-group">
            <label for="empleado_id">Empleado</label>
            <select class="form-control" class="form-control" id="empleado_id" name="empleado_id">
                <option value="" selected disabled> Selecciona una opción </option>
                @foreach ($empleados as $empleado)
                    <option {{isset($datos) ? $empleado->id == $datos->empleado_id ? 'selected' : '' : ''}}>
                        {{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}
                    </option>
                @endforeach
            </select>
            @error('empleado_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <input type="hidden" id="id-user">
            <label for="username">Usuario</label>
            <input type="text" id="input-username"  value="{{ old('username', isset($datos) ? $datos->username : '') }}" class="form-control @error('username') is-invalid @enderror" name="username"  placeholder="Usuario">
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="email">E-mail</label>
            <input type="text" id="input-email" value="{{ old('email', isset($datos) ? $datos->email : '') }}" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="E-mail">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="email">Password</label>
            <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="input-password" name="input-password" placeholder="············" aria-describedby="reset-password-new" tabindex="1" autofocus="">
                <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

</div>
<div class="modal-footer">
    <a href="{{ route('user.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>