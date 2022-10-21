@extends('layouts/contentLayoutMaster')

@section('title', 'Slider')

@include('components/slider_main/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Slider</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <form class="mt-2" method="POST" action="{{ route('slider.update', $datos->id) }}" id="formSlider" name="formSlider" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @include('components/slider_main/form')
      </form>
    </div>
  </div>
</div>
@endsection
