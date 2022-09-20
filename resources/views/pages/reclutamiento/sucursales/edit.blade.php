@extends('layouts/contentLayoutMaster')

@section('title', 'Sucursales')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Sucursales</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('sucursales.update', $datos->id) }}">
            @csrf
            @method('PUT')
            @include('components/reclutamiento/sucursales/form')
        </form>
    </div>
  </div>
</div>
@endsection
