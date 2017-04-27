@extends('layouts.backend')

@section('title', 'Create Page')

@section('content')

  <form class="" action="{{ route('backend.pages.store') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" value="" name="title" type="text">
    </div>

    <div class="form-group">
      <label for="uri">URI</label>
      <input class="form-control" value="" name="uri" type="text">
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" value="" name="name" type="text">
      <p class="help-block">
        This name is used to generate links to the page.
      </p>
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea rows="10" class="form-control" value="" name="content"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Page</button>
  </form>

  <script type="text/javascript">
    new SimpleMDE().render();
  </script>

@endsection
