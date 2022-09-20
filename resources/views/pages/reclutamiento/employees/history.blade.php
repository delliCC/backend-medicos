@extends('layouts/contentLayoutMaster')

@section('title', 'Empleados')

@include('components/reclutamiento/employees/scripts')

@section('content')

<div class="col-xl-12 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Tab with icon</h4>
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
          <p>
            Candy canes donut chupa chups candy canes lemon drops oat cake wafer. Cotton candy candy canes marzipan
            carrot cake. Sesame snaps lemon drops candy marzipan donut brownie tootsie roll. Icing croissant bonbon
            biscuit gummi bears. Pudding candy canes sugar plum cookie chocolate cake powder croissant.
          </p>
          @include('components/medicos/table')
        </div>
        <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
          <p>
            Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
            Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
            brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
          </p>
          <p>
            Croissant pie cheesecake sweet roll. Gummi bears cotton candy tart jelly-o caramels apple pie jelly
            danish marshmallow. Icing caramels lollipop topping. Bear claw powder sesame snaps.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection