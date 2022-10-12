@extends('layouts/contentLayoutMaster')

@section('title', 'Vacantes')

@include('components/reclutamiento/vacantes/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Vacantes</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form method="POST" action="{{ route('vacant.update', $datos->id) }}" class="mt-2" id="formVacantes" name="formVacantes" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('components/reclutamiento/vacantes/formEdit')
        </form>
    </div>
  </div>
</div>
@endsection
