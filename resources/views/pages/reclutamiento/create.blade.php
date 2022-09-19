@extends('layouts/contentLayoutMaster')

@section('title', 'Webinar')

@section('content')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Webinar</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" id="formWebinar" files="true">
            @csrf
            @include('components/webinar/form')
        </form>
    </div>
  </div>
</div>
@endsection