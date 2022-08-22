@extends('layouts/contentLayoutMaster')

@section('title', 'Medicos')

@include('components/medicos/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Médicos</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('medicos.store') }}">
            @csrf
            @include('components/medicos/form')
        </form>
    </div>
  </div>
</div>
@endsection