@extends('layouts/contentLayoutMaster')

@section('title', 'Puestos')

@include('components/reclutamiento/puestos/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <div class="col-12">
      @if ($message = Session::get('success'))
        <div class="alert alert-success mb-2" role="alert">
          <strong>¡Bien!</strong> {{ $message }}.
        </div>
      @endif
    </div>
    <div class="col-9">
      <h4 class="card-title text-left">Listas de Puestos</h4>
    </div>
    <div class="col-3 text-right">
      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#default">
        Crear Puesto
      </button>
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/reclutamiento/puestos/table')
        </div>
      </div>
    </div>
  </section>
</div>

@include('components/reclutamiento/puestos/modal')

@endsection
