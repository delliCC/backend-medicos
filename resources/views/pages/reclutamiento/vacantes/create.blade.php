@extends('layouts/contentLayoutMaster')

@section('title', 'Vacantes')

@section('content')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Vacantes</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" id="formVacantes" files="true">
            @csrf
            @include('components/reclutamiento/vacantes/form')
        </form>
    </div>
  </div>
</div>
@endsection