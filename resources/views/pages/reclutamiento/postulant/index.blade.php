@extends('layouts/contentLayoutMaster')

@section('title', 'Postulante')

@include('components/reclutamiento/postulant/scripts')

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
      <h4 class="card-title text-left">Lista de postulantes</h4>
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          <form class="form">
            @include('components/reclutamiento/postulant/formBusqueda')
          </form>
          @include('components/reclutamiento/postulant/table')
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
