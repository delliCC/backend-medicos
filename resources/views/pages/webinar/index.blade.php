@extends('layouts/contentLayoutMaster')

@section('title', 'Webinar')

@include('components/webinar/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <div class="col-12">
      @if ($message = Session::get('success'))
        <div class="alert alert-success mb-2" role="alert">
          <strong>¡Bien!</strong> {{ $message }}.
        </div>
      @endif
    </div>
    <div class="col-9">
      <h4 class="card-title text-left">Lista de Webinar</h4>
    </div>
    <div class="col-3 text-right">
      <a href="{{route('webinar.create')}}" class="btn btn-outline-success"><i data-feather="plus"></i> Nuevo Webinar</a>
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/webinar/table')
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
