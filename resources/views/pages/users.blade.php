@extends('layouts/contentLayoutMaster')

@section('title', 'Usuarios')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <div class="col-12">
      <div class="card">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="card-header border-bottom p-1">
            <div class="head-label"></div>
            <div class="dt-action-buttons text-end">
              <div class="dt-buttons d-inline-flex">
                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#default">
                  Nuevo Medico
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form class="form">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column">Nombre</label>
                    <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="last-name-column">Usuario</label>
                    <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="company-column">Estatus</label>
                    <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                  </div>
                </div>
                <div class="col-12" style="text-align: center;">
                  <button type="reset" class="btn btn-success me-1 waves-effect waves-float waves-light">Buscar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="col-12">
      <div class="card">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          @include('components/medicos/table')
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Crear especialidad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addNewSpecialty" class="row gy-1 gx-2" onsubmit="return false" novalidate="novalidate">
          <div class="col-6">
            <label class="form-label" for="especialidad">Nombre</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Paterno</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Materno</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">E-mail</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Celular</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Dirección</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Pais</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Estado</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Municipio</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Prefijo</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Hospital</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Medico</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="col-6">
            <label class="form-label" for="especialidad">Especialidad</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success waves-effect">Guardar</button>
        <button type="button" class="btn btn-outline-dark waves-effect" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!--/ Kick start -->
@endsection
