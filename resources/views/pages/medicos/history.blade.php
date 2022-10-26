@extends('layouts/contentLayoutMaster')

@section('title', 'Médicos')

@include('components/medicos/history/scripts')

@section('content')

<div class="col-xl-12 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Historial</h4>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link active"
            id="homeIcon-tab"
            data-toggle="tab"
            href="#homeIcon"
            aria-controls="home"
            role="tab"
            aria-selected="true"
            ><i data-feather='bookmark'></i> Webinar</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#profileIcon"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Capacitación</a
          >
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
          @include('components/medicos/history/table')
        </div>
        <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
          @include('components/medicos/history/training/table')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection