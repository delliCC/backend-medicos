@extends('layouts/contentLayoutMaster')

@section('title', 'Blog')

@include('components/blog/scripts')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Crear Blog</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <form method="POST" action="{{ route('blog.store') }}" class="mt-2" id="formBlog" name="formBlog" enctype="multipart/form-data">
          @csrf
          @include('components/blog/form')
      </form>
    </div>
  </div>
</div>
@endsection