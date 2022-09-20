@extends('layouts/contentLayoutMaster')

@section('title', 'Empleados')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Médico</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('employees.update', $medico->id) }}">
            @csrf
            @method('PUT')
            @include('components/reclutamiento/employees/form')
        </form>
    </div>
  </div>
</div>
@endsection
