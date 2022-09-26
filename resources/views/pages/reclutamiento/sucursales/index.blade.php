@extends('layouts/contentLayoutMaster')

@section('title', 'Sucursales')

@include('components/reclutamiento/sucursales/scripts')

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
      <h4 class="card-title text-left">Lista de Sucursales</h4>
    </div>
    <div class="col-3 text-right">
      <a href="{{route('sucursales.create')}}" class="btn btn-outline-success"><i data-feather="plus"></i> Nueva sucursal</a>
    </div>
  </div>
  {{--  <section id="multiple-column-form">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form class="form">
              @include('components/reclutamiento/sucursales/formBusqueda')
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>  --}}
  <!-- Basic table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          @include('components/reclutamiento/sucursales/table')
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
