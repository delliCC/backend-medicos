@extends('layouts/contentLayoutMaster')

@section('title', 'Medicos')

@include('components/medicos/scripts')

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
      <h4 class="card-title text-left">Lista de Médicos</h4>
    </div>
    <div class="col-3 text-right">
      <a href="{{route('medicos.create')}}" class="btn btn-outline-warning"><i data-feather="plus"></i> Nuevo Médico</a>
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/medicos/table')
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
