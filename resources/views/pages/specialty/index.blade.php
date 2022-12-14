@extends('layouts/contentLayoutMaster')

@section('title', 'Especialidades')

@include('components/specialty/scripts')

@section('content')
<!-- Kick start -->
<div class="card page-blockui">
  <div class="card-header">
    {{--  <div id="loading">
      <div class="spinner-grow text-success" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="spinner-grow text-warning" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="spinner-grow text-info" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>  --}}
    <div class="col-12">
      @if ($message = Session::get('success'))
        <div class="alert alert-success mb-2" role="alert">
          <strong>¡Bien!</strong> {{ $message }}.
        </div>
      @endif
    </div>
    <div class="col-9">
      <h4 class="card-title text-left">Lista de Especialidades</h4>
    </div>
    <div class="col-3 text-right">
      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#default">
        Crear Especialidad
      </button>
    </div>
  </div>

  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/specialty/table')
        </div>
      </div>
    </div>
  </section>
</div>

@include('components/specialty/modal')

@endsection

