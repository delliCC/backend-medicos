<div class="row">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="divider divider-left  divider-success">
            <div class="divider-text">Datos del Empleado</div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="numero_empleado_id">Número de empleado <i style="color: red">*</i></label>
            <input type="text" value="{{ old('numero_empleado_id', isset($datos) ? $datos->numero_empleado_id : '') }}" class="form-control @error('numero_empleado_id') is-invalid @enderror" name="numero_empleado_id"  placeholder="Número de empleado">
            @error('numero_empleado_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="nombre">Nombre <i style="color: red">*</i></label>
            <input type="text" value="{{ old('nombre', isset($datos) ? $datos->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
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
            <input type="text" value="{{ old('apellido_paterno', isset($datos) ? $datos->apellido_paterno : '') }}" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno"  placeholder="Apellido paterno">
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
            <input type="text" value="{{ old('apellido_materno', isset($datos) ? $datos->apellido_materno : '') }}" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno"  placeholder="Apellido materno">
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
            <input type="email" value="{{ old('correo', isset($datos) ? $datos->correo : '') }}" class="form-control @error('correo') is-invalid @enderror" name="correo"  placeholder="Correo">
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
            <input type="tel" value="{{ old('telefono', isset($datos) ? $datos->telefono : '') }}" class="form-control @error('telefono') is-invalid @enderror" name="telefono"  placeholder="Teléfono">
            @error('telefono')
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
            <input type="text" value="{{ old('pais', isset($datos) ? $datos->pais : '') }}" class="form-control @error('pais') is-invalid @enderror" name="pais"  placeholder="País">
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
            <input type="text" value="{{ old('estado', isset($datos) ? $datos->estado : '') }}" class="form-control @error('estado') is-invalid @enderror" name="estado"  placeholder="Estado">
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
            <input type="text" value="{{ old('municipio', isset($datos) ? $datos->municipio : '') }}" class="form-control @error('municipio') is-invalid @enderror" name="municipio"  placeholder="Municipio">
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
                {{ isset($datos) ? $datos->direccion : '' }}
            </textarea>
            @error('direccion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    
    <div class="col-xl-12 col-md-12 col-12">
        <a href="{{ route('employees.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
        <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
    </div>
</div>