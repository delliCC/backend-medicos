@extends('layouts/contentLayoutMaster')

@section('title', 'Vacantes')

@include('components/reclutamiento/vacantes/scripts')

@section('content')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Vacantes</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form method="POST" action="{{ route('vacant.store') }}" class="mt-2" id="formVacantes" name="formVacantes" enctype="multipart/form-data">
            @csrf
            @include('components/reclutamiento/vacantes/form')
        </form>
    </div>
  </div>
</div>
@endsection