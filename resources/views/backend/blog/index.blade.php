@extends('layouts.backend')

@section('title', 'Blog')

@section('content')
  <a href="{{ route('backend.blog.create') }}" class="btn btn-primary">Create New Blog Post</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Author</th>
        <th>Published At</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr class="{{$post->present()->publishedHighlight}}">
          <td>
            <a href="{{ route('backend.blog.edit', ['post' => $post->id]) }}">{{$post->title}}</a>
          </td>
          <td>{{$post->slug}}</td>
          <td>{{$post->author->name}}</td>
          <td>{{$post->present()->publishedDate}}</td>
          <td>
            <a href="{{ route('backend.blog.edit', ['post' => $post->id]) }}">
              <span class="glyphicon glyphicon-edit"></span>
            </a>
          </td>
          <td>
            <a href="{{ route('backend.blog.confirm', $post->id) }}">
              <span class="glyphicon glyphicon-remove"></span>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {!! $posts->render() !!}

@endsection
