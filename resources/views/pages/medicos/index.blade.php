@extends('layouts/contentLayoutMaster')

@section('title', 'Medicos')

@include('components/medicos/scripts')

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
      <h4 class="card-title text-left">Lista de Médicos</h4>
    </div>
    <div class="col-3 text-right">
      <a href="{{route('medicos.create')}}" class="btn btn-outline-success"><i data-feather="plus"></i> Nuevo Médico</a>
    </div>
  </div>
  {{--  <section id="multiple-column-form">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Multiple Column</h4>
          </div>
          <div class="card-body">
            <form class="form">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column">Fecha Inicio</label>
                    <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="last-name-column">Fecha Fin</label>
                    <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="city-column">Medico</label>
                    <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="country-floating">Estatus</label>
                    <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                  </div>
                </div>
                <div class="col-12">
                  <button type="reset" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                </div>
              </div>
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
          <form class="form">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="first-name-column">Fecha Inicio</label>
                  <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Fecha Fin</label>
                  <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="city-column">Medico</label>
                  <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="country-floating">Estatus</label>
                  <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                </div>
              </div>
              <div class="col-12">
                <button type="reset" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
              </div>
            </div>
          </form>
          {{--  @include('components/medicos/table')  --}}
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
