@extends('layouts.backend')

@section('title', 'Edit Blog Post')

@section('content')
  <form class="" action="{{route('backend.blog.update')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" type="text" name="title" value="{{$post->title}}">
    </div>

    <div class="form-group">
      <label for="slug">Slug</label>
      <input class="form-control" type="text" name="slug" value="{{$post->slug}}">
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="published_at">Published At</label>
      </div>
      <div class="col-md-4">
        <input class="form-control" type="text" name="published_at" value="{{$post->published_at}}">
      </div>
    </div>

    <div class="form-group excerpt">
      <label for="excerpt">Excerpt</label>
      <textarea class="form-control" name="excerpt" value="{{$post->excerpt}}" ></textarea>
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="body" value="{{$post->body}}"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Blog Post</button>
  </form>

  <script type="text/javascript">
    new SimpleMDE({
      element: document.getElementsByName('body')[0]
    }).render();

    new SimpleMDE({
      element: document.getElementsByName('excerpt')[0]
    }).render();

    $('input[name=published_at]').datetimepicker({
      allowInputToggle: true,
      format: 'YYYY-MM-DD HH:mm:ss',
      showClear: true,
      defaultDate: '{{ old('published_at', $post->published_at) }}'
    });

    $('input[name=title]').on('blur', function(){
      var slugElement = $('input[name=slug]');

      if(slugElement.val()){
        return;
      }

      slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
    });
  </script>

@endsection
