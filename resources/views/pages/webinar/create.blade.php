@extends('layouts/contentLayoutMaster')

@section('title', 'Webinar')
@include('components/webinar/scripts')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Webinar</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form method="POST" action="{{ route('webinar.store') }}" class="mt-2" id="formWebinar" name="formWebinar" enctype="multipart/form-data">
      
        {{--  <form class="mt-2" method="POST" id="formWebinar" files="true">  --}}
            @csrf
            @include('components/webinar/form')
        </form>
    </div>
  </div>
</div>
@endsection