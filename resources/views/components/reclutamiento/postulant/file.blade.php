<div class="custom-control custom-switch custom-switch-success">
    @foreach ($data->documentos  as $doc )
        <a href="{{$doc->imagen_url}}" class="btn btn btn-gradient-danger btn-sm" target="_blank"><i data-feather="file"></i></a>
    @endforeach
</div>