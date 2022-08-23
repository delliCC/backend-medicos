<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="medico_id">Medico</label>
            <input type="text" id="input-medico_id"  value="{{ old('medico_id', isset($datos) ? $datos->medico_id : '') }}" class="form-control @error('medico_id') is-invalid @enderror" name="medico_id"  placeholder="Medico">
            @error('medico_id')
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
            <input type="text" id="input-email"  value="{{ old('email', isset($datos) ? $datos->email : '') }}" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="E-mail">
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