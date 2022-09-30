<div class="row">
  <div class="col-6 mb-1">
    <label for="reclutador_id">Reclutador</label>
    <select class="form-control" class="form-control" id="reclutador_id" name="reclutador_id">
        <option value="" selected disabled> Selecciona una opción </option>
        @foreach ($empleados as $reclutador)
            <option value="{{$reclutador->id}}"  {{isset($datos) ? $reclutador->id == $reclutador->reclutador_id ? 'selected' : '' : ''}}>
                {{ $reclutador->nombre }} {{ $reclutador->apellido_paterno }} {{ $reclutador->apellido_materno }}
            </option>
        @endforeach
    </select>
    @error('reclutador_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="col-md-6 col-12">
    <div class="mb-1">
      <label class="form-label" for="city-column">Estados</label>
      <select class="form-control" class="form-control" id="valor">
        <option value="" selected disabled> Selecciona una opción </option>
        <option value="postulante">Postulante</option>
        <option value="seleccionado">Seleccionado</option>
        <option value="cartera">Cartera</option>
      </select>
    </div>
  </div>
  
  <div class="col-12" style="text-align: center;">
    <button type="reset" class="btn btn-primary me-1 waves-effect waves-float waves-light">Buscar</button>
  </div>
</div>