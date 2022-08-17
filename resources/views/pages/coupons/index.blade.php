@extends('layouts/contentLayoutMaster')

@section('title', 'Cupones')

@include('components/coupons/scripts')

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
      <h4 class="card-title text-left">Cupones</h4>
    </div>
    <div class="col-3 text-right">
      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#default">
        Crear Cupón
      </button>
      {{--  <a href="{{route('medicos.create')}}" class="btn btn-outline-success"><i data-feather="plus"></i> Nuevo Médico</a>  --}}
    </div>
  </div>
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/coupons/table')
        </div>
      </div>
    </div>
  </section>
</div>

@include('components/coupons/modal')

@endsection
