@extends('layouts/contentLayoutMaster')

@section('title', 'Estudios')

@include('components/studies/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Estudios</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <form method="POST" action="{{ route('studies.store') }}" class="mt-2" id="formStudie" name="formStudie" enctype="multipart/form-data">
        @csrf
        @include('components/studies/form')
      </form>
    </div>
  </div>
</div>
@endsection