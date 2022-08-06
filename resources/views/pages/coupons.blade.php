@extends('layouts/contentLayoutMaster')

@section('title', 'Cupones')

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
                  Crear Cupones
                </button>
              </div>
            </div>
          </div>  
          @include('components/coupons/table')
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Page layout -->

<!-- Add Role Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Registrar Cupón</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{--  <button id="clear-dropzone" class="btn btn-outline-primary mb-1 waves-effect">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-25"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
          <span class="align-middle">Clear Dropzone</span>
        </button>  --}}
        {{--  <form action="#" class="dropzone dropzone-area dz-clickable" id="dpz-remove-all-thumb">
          <div class="col-12">
            <label class="form-label" for="especialidad">Especialidad</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="especialidad">
          </div>
          <div class="dz-message">Drop files here or click to upload.</div>
        </form>  --}}
        <button
        class="btn btn-primary add-file-btn text-center btn-block"
        type="button"
        id="addNewFile"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="true"
      >
        <span class="align-middle">Add New</span>
      </button>
        <form id="addNewSpecialty" class="row gy-1 gx-2" onsubmit="return false" novalidate="novalidate">
          <div class="dropdown-menu" aria-labelledby="addNewFile">
            <div class="dropdown-item" data-toggle="modal" data-target="#new-folder-modal">
              <div class="mb-0">
                <i data-feather="folder" class="mr-25"></i>
                <span class="align-middle">Folder</span>
              </div>
            </div>
            <div class="dropdown-item">
              <div class="mb-0" for="file-upload">
                <i data-feather="upload-cloud" class="mr-25"></i>
                <span class="align-middle">File Upload</span>
                <input type="file" id="file-upload" hidden />
              </div>
            </div>
            <div class="dropdown-item">
              <div for="folder-upload" class="mb-0">
                <i data-feather="upload-cloud" class="mr-25"></i>
                <span class="align-middle">Folder Upload</span>
                <input type="file" id="folder-upload" webkitdirectory mozdirectory hidden />
              </div>
            </div>
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
