@extends('layouts/contentLayoutMaster')

@section('title', 'Empleados')

@include('components/reclutamiento/employees/scripts')

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
      <h4 class="card-title text-left">Lista de Empleados</h4>
    </div>
    <div class="col-3 text-right">
      <a href="{{route('employees.create')}}" class="btn btn-outline-success"><i data-feather="plus"></i> Nuevo empleado</a>
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/reclutamiento/employees/table')
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
