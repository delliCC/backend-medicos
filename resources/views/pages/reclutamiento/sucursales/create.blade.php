@extends('layouts/contentLayoutMaster')

@section('title', 'Sucursales')

@include('components/reclutamiento/sucursales/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Sucursales</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('sucursales.store') }}">
            @csrf
            @include('components/reclutamiento/sucursales/form')
        </form>
    </div>
  </div>
</div>
@endsection