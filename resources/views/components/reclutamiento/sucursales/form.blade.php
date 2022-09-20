<div class="row">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="divider divider-left  divider-success">
            <div class="divider-text">Datos de la Sucursal</div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 col-12 mb-1">
        <fieldset class="form-group">
            <label for="sucursal">Sucursal<i style="color: red">*</i></label>
            <input type="text" value="{{ old('sucursal', isset($datos) ? $datos->sucursal : '') }}" class="form-control @error('sucursal') is-invalid @enderror" name="sucursal"  placeholder="Sucursal">
            @error('sucursal')
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
        <a href="{{ route('sucursales.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
        <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
    </div>
</div>