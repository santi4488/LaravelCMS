@extends('layouts.backend')

@section('title', 'Edit ' . $page->title)

@section('content')
  <form class="" action="{{ route('backend.pages.update', $page->id) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}



    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" name="title" type="text" value="{{ $page->title }}">
    </div>

    <div class="form-group">
      <label for="uri">URI</label>
      <input class="form-control" name="uri" type="text" value="{{ $page->uri }}">
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" name="name" type="text" value="{{ $page->name }}">

      <p class="help-block">
        This name is used to generate links to the page.
      </p>
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea rows="10" class="form-control" name="content">{{ $page->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Page</button>
  </form>

  <script type="text/javascript">
    new SimpleMDE().render();
  </script>
@endsection
