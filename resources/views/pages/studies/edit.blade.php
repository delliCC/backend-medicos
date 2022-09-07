@extends('layouts/contentLayoutMaster')

@section('title', 'Estudios')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Estudios</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('studies.update', $datos->id) }}">
            @csrf
            @method('PUT')
            @include('components/studies/form')
        </form>
    </div>
  </div>
</div>
@endsection
