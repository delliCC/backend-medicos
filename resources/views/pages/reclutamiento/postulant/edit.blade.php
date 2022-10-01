

@extends('layouts/contentLayoutMaster')

@section('title', 'Postulante')

@include('components/reclutamiento/postulant/scripts')

@section('content')

<div class="col-xl-12 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Editar Postulante</h4>
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
            ><i data-feather='bookmark'></i> Datos Personales</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#direccion"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Dirección</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#datosFamiliares"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Datos Familiares</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#datosEscolares"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Datos Escolares</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#conocimientosGenerales"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Conocimientos Generales</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#referenciaPersonales"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Referencias Personales</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#trayectoria"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Trayectoria Laboral</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#datosGenerales"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Datos Generales</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#datosEconomicos"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Datos Económicos</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            id="profileIcon-tab"
            data-toggle="tab"
            href="#documentos"
            aria-controls="profile"
            role="tab"
            aria-selected="false"
            ><i data-feather='award'></i> Documentos</a
          >
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
          <form class="mt-2" method="POST" action="{{ route('postulant.update', $datos->id) }}">
              @csrf
              @method('PUT')
              @include('components/reclutamiento/postulant/form')
          </form>
        </div>
        <div class="tab-pane" id="direccion" aria-labelledby="profileIcon-tab" role="tabpanel">
          <p>
            Croissant pie cheesecake sweet roll. Gummi bears cotton candy tart jelly-o caramels apple pie jelly
            danish marshmallow. Icing caramels lollipop topping. Bear claw powder sesame snaps.
          </p>
        </div>
        <div class="tab-pane" id="datosFamiliares" aria-labelledby="profileIcon-tab" role="tabpanel">
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
        <div class="tab-pane" id="datosEscolares" aria-labelledby="profileIcon-tab" role="tabpanel">
          <p>
            Croissant pie cheesecake sweet roll. Gummi bears cotton candy tart jelly-o caramels apple pie jelly
            danish marshmallow. Icing caramels lollipop topping. Bear claw powder sesame snaps.
          </p>
        </div>
        <div class="tab-pane" id="conocimientosGenerales" aria-labelledby="profileIcon-tab" role="tabpanel">
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
        <div class="tab-pane" id="referenciaPersonales" aria-labelledby="profileIcon-tab" role="tabpanel">
          <p>
            Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
            Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
            brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
          </p>
        </div>
        <div class="tab-pane" id="trayectoria" aria-labelledby="profileIcon-tab" role="tabpanel">
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
        <div class="tab-pane" id="datosGenerales" aria-labelledby="profileIcon-tab" role="tabpanel">
          <p>
            Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
            Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
            brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
          </p>
        </div>
        <div class="tab-pane" id="datosEconomicos" aria-labelledby="profileIcon-tab" role="tabpanel">
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
        <div class="tab-pane" id="documentos" aria-labelledby="profileIcon-tab" role="tabpanel">
          <p>
            Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
            Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
            brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
