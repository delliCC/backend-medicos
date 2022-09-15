@extends('layouts/contentLayoutMaster')

@section('title', 'Capacitación')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Capacitación</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('training.update', $datos->id) }}">
            @csrf
            @method('PUT')
            @include('components/training/form')
        </form>
    </div>
  </div>
</div>
@endsection
