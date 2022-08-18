@extends('layouts/contentLayoutMaster')

@section('title', 'Especialidades')

@include('components/specialty/scripts')

@section('content')
<!-- Kick start -->
<div class="card page-blockui">
  <div class="card-header">
    <div id="loading">
      <div class="spinner-grow text-success" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="spinner-grow text-warning" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="spinner-grow text-info" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
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

<div class="col-md-6">
  <section class="page-blockui">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Form Blocking</h4>
      </div>
      <div class="card-body">
        <form class="form-block p-50">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" placeholder="Username" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" placeholder="Email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" placeholder="Password" />
          </div>
          <div class="form-group text-right mb-0">
            <button class="btn btn-primary disabled mr-75">Submit</button>
            <button class="btn btn-outline-secondary disabled">Reset</button>
          </div>
        </form>
        <div class="demo-inline-spacing">
          <button class="btn btn-outline-primary btn-form-block">Default</button>
          <button class="btn btn-outline-primary btn-form-block-overlay">Overlay Color</button>
          <button class="btn btn-outline-primary btn-form-block-spinner">Custom Spinner</button>
          <button class="btn btn-outline-primary btn-form-block-custom">Custom Message</button>
          <button class="btn btn-outline-primary btn-form-block-multiple">Multiple Message</button>
        </div>
      </div>
    </div>
  </section>
</div>

@include('components/specialty/modal')

@endsection

