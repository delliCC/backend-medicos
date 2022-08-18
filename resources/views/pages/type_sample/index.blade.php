@extends('layouts/contentLayoutMaster')

@section('title', 'Muestra')

@include('components/type_sample/scripts')

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
      <h4 class="card-title text-left">Tipo de muestra</h4>
    </div>
    <div class="col-3 text-right">
      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#default">
        Crear Muestra
      </button>
      {{--  <a href="{{route('sample.create')}}" class="btn btn-outline-success"><i data-feather="plus"></i> Nuevo Médico</a>  --}}
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/type_sample/table')
        </div>
      </div>
    </div>
  </section>
</div>

@include('components/type_sample/modal')

@endsection
