<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1"> Puesto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="mt-2" method="POST"  id="formPuesto">
          @csrf
          @include('components/reclutamiento/puestos/form')
        </form>
      </div>
  </div>
</div>

