<input type="hidden" value="{{ old('id', isset($datos) ? $datos->id : '') }}">
<div class="modal-body">
    @foreach ($rutas as $key => $ruta)
        <div class="col-12 mb-1">
            <fieldset class="form-group">
                <label for="name">
                <input type="checkbox" id="idCbx{{$key}}"
                {{--  value="{{$puesto->id}}" {{isset($datos) ? $puesto->id == $datos->puesto_id ? 'selected' : '' : ''}}  --}}
                >  
                {{$ruta}}</label><br>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </fieldset>
        </div>
    @endforeach
</div>
<div class="modal-footer">
    <a href="{{ route('roles.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>