@extends('layouts/contentLayoutMaster')

@section('title', 'Especialidades')

@section('content')

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

@include('components/specialty/modal')

@endsection

@section('javascript')
<script src="{{ asset('js/scripts/components/specialty/specialty.js') }}"></script>
@endsection