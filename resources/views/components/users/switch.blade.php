<div class="custom-control custom-switch custom-switch-success">
  <input
    type="checkbox"
    class="custom-control-input"
    id="valor_{{ $data->id }}"
    value="{{ $data->id }}"
    onClick="changeStatus(event, {{$data->id}})"
    @if ($data->status)
        checked
    @endif
  />
  <label class="custom-control-label" for="valor_{{ $data->id }}"></label>
</div>