<div class="modal-body">
    <div class="col-12 mb-1">
        <fieldset class="form-group">
            <label for="cupones">Nombre</label>
            <input type="text" value="{{ old('nombre', isset($cupon) ? $cupon->nombre : '') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  placeholder="Nombre">
            @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>
    </div>
    
    <div class="col-12 mb-2">
        <div class="border rounded p-2">
          <h4 class="mb-1">Featured Image</h4>
          <div class="media flex-column flex-md-row">
            <img
              src="{{asset('images/slider/03.jpg')}}"
              id="blog-feature-image"
              class="rounded mr-2 mb-1 mb-md-0"
              width="170"
              height="110"
              alt="Blog Featured Image"
            />
            <div class="media-body">
              <h5 class="mb-0">Main image:</h5>
              <small class="text-muted">Required image resolution 800x400, image size 10mb.</small>
              <p class="my-50">
                <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
              </p>
              <div class="d-inline-block">
                <div class="form-group mb-0">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" />
                    <label class="custom-file-label" for="blogCustomFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
<div class="modal-footer">
    <a href="{{ route('coupons.index') }}" class="btn btn-outline-warning"><i data-feather="slash"></i> Cancelar</a>
    <button type="button" class="btn btn-success"><i data-feather="save"></i> Guardar</button>
</div>
