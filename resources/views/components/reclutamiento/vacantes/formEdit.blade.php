<div class="row">
  <div class="col-xl-12 col-md-12 col-12">
      <div class="divider divider-left  divider-success">
          <div class="divider-text">Datos de la vacante</div>
      </div>
  </div>

  <div class="col-4 mb-1">
    <fieldset class="form-group">
        <label for="puesto_id">Puesto</label>
        <select class="form-control" class="form-control" id="puesto_id" name="puesto_id">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($puestos as $puesto)
                <option value="{{$puesto->id}}" {{isset($datos) ? $puesto->id == $datos->puesto_id ? 'selected' : '' : ''}}>
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
        <label for="sucursal_id">Sucursal</label>
        <select class="form-control" class="form-control" id="sucursal_id" name="sucursal_id">
            @foreach ($sucursales as $sucursal)
                <option value="{{$sucursal->id}}" {{isset($datos) ? $sucursal->id == $datos->sucursal_id ? 'selected' : '' : ''}}>
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
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" value="{{ old('cantidad', isset($datos) ? $datos->cantidad : '') }}" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad"  placeholder="cantidad">
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
                <option value="{{$reclutador->id}}"  {{isset($datos) ? $reclutador->id == $datos->reclutador_id ? 'selected' : '' : ''}}>
                    {{ $reclutador->nombre }} {{ $reclutador->apellido_paterno }} {{ $reclutador->apellido_materno }}
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
  {{--  <div class="col-12 mb-2">
    <div class="border rounded p-2">
      <h4 class="mb-1">Imagen</h4>
      <div class="media flex-column flex-md-row">
        <img
          src="{{asset('images/slider/03.jpg')}}"
          id="blog-feature-image"
          class="rounded mr-2 mb-1 mb-md-0"
          width="170"
          height="110"
          alt="Blog Featured Image"
        />
        <div class="media-body">
            <h5 class="mb-0">Main image:</h5>  
          <small class="text-muted"> El tamaño máximo de archivo es de 1M.</small>
          <p class="my-50">
            <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
          </p>
          <div class="d-inline-block">
            <div class="form-group mb-0">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="input-imagen" accept="image/*" />
                <label class="custom-file-label" for="input-imagen">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  --}}

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