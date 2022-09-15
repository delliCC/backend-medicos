@extends('layouts/contentLayoutMaster')

@section('title', 'Capacitación')

@section('content')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Capacitación</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" id="formTraining" files="true">
            @csrf
            @include('components/training/form')
        </form>
    </div>
  </div>
</div>
@endsection