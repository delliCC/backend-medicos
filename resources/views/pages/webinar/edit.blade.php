@extends('layouts/contentLayoutMaster')

@section('title', 'Webinar')
@include('components/webinar/scripts')
@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Webinar</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('webinar.update', $datos->id) }}">
            @csrf
            @method('PUT')
            @include('components/webinar/form')
        </form>
    </div>
  </div>
</div>
@endsection
