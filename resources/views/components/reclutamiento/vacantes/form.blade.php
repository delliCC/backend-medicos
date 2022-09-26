<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos de la vacante</div>
      </div>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="medico_id">Puesto</label>
        <select class="form-control" class="form-control" id="puesto_id" name="puesto_id">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($puestos as $puesto)
                <option {{isset($datos) ? $puesto->id == $puesto->puesto_id ? 'selected' : '' : ''}}>
                    {{ $puesto->puesto }}
                </option>
            @endforeach
        </select>
        @error('puesto_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
</div>


  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="medico_id">Sucursal</label>
        <select class="form-control" class="form-control" id="sucursal_id" name="sucursal_id">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($sucursales as $sucursal)
                <option {{isset($datos) ? $sucursal->id == $sucursal->sucursal_id ? 'selected' : '' : ''}}>
                    {{ $sucursal->sucursal }}
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

<div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" value="{{ old('cantidad', isset($datos) ? $datos->cantidad : '') }}" class="form-control @error('horario') is-invalid @enderror" name="horario"  placeholder="horario">
        @error('cantidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="horario">Horario</label>
        <input type="text" id="input-horario" value="{{ old('horario', isset($datos) ? $datos->horario : '') }}" class="form-control @error('horario') is-invalid @enderror" name="horario"  placeholder="horario">
        @error('horario')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="salario">Salario</label>
        <input type="text" id="salario" value="{{ old('salario', isset($datos) ? $datos->salario : '') }}" class="form-control @error('salario') is-invalid @enderror" name="salario"  placeholder="salario">
        @error('salario')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="reclutador_id">Reclutador</label>
        <select class="form-control" class="form-control" id="reclutador_id" name="reclutador_id">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($empleados as $reclutador)
                <option {{isset($datos) ? $reclutador->id == $reclutador->reclutador_id ? 'selected' : '' : ''}}>
                    {{ $reclutador->nombre }}
                </option>
            @endforeach
        </select>
        @error('reclutador_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
</div>

  <div class="col-12 mb-2">
    <fieldset class="form-group">
      <label for="input-imagen">Imagen</label>
      <small class="text-muted"> El tamaño máximo de archivo es de 1M.</small>
      <div class="custom-file b-form-file" data-v-3bcd05f2="" id="__BVID__1505__BV_file_outer_">
        <input name="imagen" type="file" class="custom-file-input" id="input-imagen" style="z-index: -5;" accept="image/*">
        <label data-browse="Browse" class="custom-file-label" for="input-imagen">
          <span class="d-block form-file-text" style="pointer-events: none;"></span></label>
      </div>
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="prestaciones">Prestaciones <i style="color: red">*</i></label>
        <textarea class="form-control @error('prestaciones') is-invalid @enderror" id="prestaciones" name="prestaciones"  placeholder="prestaciones">{{ isset($datos) ? $datos->prestaciones : '' }}</textarea>
        @error('prestaciones')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="requisitos">Requisitos <i style="color: red">*</i></label>
        <textarea class="form-control @error('requisitos') is-invalid @enderror" id="requisitos" name="requisitos"  placeholder="requisitos">{{ isset($datos) ? $datos->requisitos : '' }}</textarea>
        @error('requisitos')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-6 col-md-12 col-12">
    <fieldset class="form-group">
        <label for="funcion">Función <i style="color: red">*</i></label>
        <textarea class="form-control @error('funcion') is-invalid @enderror" id="funcion" name="funcion"  placeholder="función">{{ isset($datos) ? $datos->funcion : '' }}</textarea>
        @error('funcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </fieldset>
  </div>

  <div class="col-xl-12 col-md-12 col-12">
      <a href="{{ route('vacant.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
      <button type="submit" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
  </div>
</div>