<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="medico_id">Médico</label>
            <select class="form-control" class="form-control" id="input-medico_id" name="medico_id">
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