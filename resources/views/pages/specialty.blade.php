@extends('layouts/contentLayoutMaster')

@section('title', 'Especialidades')

@section('content')
<!-- Page layout -->
<div class="card">
  <div class="card-body">
    <div class="col-12">
      <div class="card">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="card-header border-bottom p-1">
            <div class="head-label"></div>
            <div class="dt-action-buttons text-end">
              <div class="dt-buttons d-inline-flex">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#default">
                  Crear Especialidad
                </button>
              </div>
            </div>
          </div>  
          @include('components/specialty/table')
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Page layout -->

<!-- Add Role Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Crear especialidad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addNewSpecialty" class="row gy-1 gx-2" onsubmit="return false" novalidate="novalidate">
          <div class="col-12">
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
@endsection
