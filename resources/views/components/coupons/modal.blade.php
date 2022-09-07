<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Crear Cupón</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="mt-2" method="POST" action="{{ route('coupons.store') }}">
          @csrf
          @include('components/coupons/form')
        </form>
      </div>
  </div>
</div>

<div class="modal fade text-left" id="editSpecialty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Editar Cupón</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{--  <form class="mt-2" method="POST" action="{{ route('coupons.update', $especialidad->id) }}">  --}}
          @csrf
          @method('PUT')
          @include('components/coupons/form')
      {{--  </form>  --}}
    </div>
  </div>
</div>
