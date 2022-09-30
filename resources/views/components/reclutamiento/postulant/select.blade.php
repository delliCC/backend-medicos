<div class="custom-control custom-switch custom-switch-success">
  <select class="form-control" class="form-control" id="valor" onClick="changeEstado({{$data->id}},this)">
    <option value="" selected disabled> Selecciona una opción </option>
    <option value="postulante" {{isset($data) ? 'postulante'== $data->estado_postulante ? 'selected' : '' : ''}}>Postulante</option>
    <option value="seleccionado" {{isset($data) ? 'seleccionado'== $data->estado_postulante ? 'selected' : '' : ''}}>Seleccionado</option>
    <option value="cartera" {{isset($data) ? 'cartera'== $data->estado_postulante ? 'selected' : '' : ''}}>Cartera</option>
  </select>
</div>