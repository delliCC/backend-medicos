@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@include('components/roles/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Asignación de rutas</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form method="POST" action="{{ route('asignacion.store', $datos->id) }}" class="mt-2" id="formAsignacion" name="formAsignacion">
            @csrf
            {{--  @method('PUT')  --}}
            @include('components/roles/formAsignaciones')
        </form>
    </div>
  </div>
</div>
@endsection
