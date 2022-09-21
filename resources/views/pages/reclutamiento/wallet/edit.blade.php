@extends('layouts/contentLayoutMaster')

@section('title', 'Cartera')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Editar Postulante</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
        <form class="mt-2" method="POST" action="{{ route('wallet.update', $datos->id) }}">
            @csrf
            @method('PUT')
            @include('components/reclutamiento/wallet/form')
        </form>
    </div>
  </div>
</div>
@endsection
