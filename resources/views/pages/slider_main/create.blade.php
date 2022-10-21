@extends('layouts/contentLayoutMaster')

@section('title', 'Slider')

@include('components/slider_main/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Slider</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <form method="POST" action="{{ route('slider.store') }}" class="mt-2" id="formSlider" name="formSlider" enctype="multipart/form-data">
          @csrf
          @include('components/slider_main/form')
      </form>
    </div>
  </div>
</div>
@endsection