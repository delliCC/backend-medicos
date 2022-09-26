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
        <form class="mt-2" method="POST" id="form-studie" files="true">
          {{--  action="{{ route('studies.store') }}"  --}}
            @csrf
            @include('components/studies/form')
        </form>
    </div>
  </div>
</div>
@endsection