@extends('layouts.backend')

@section('title', 'Delete ' . $user->name)

@section('content')

  <form action="{{route('backend.users.destroy', $user->id)}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    {{csrf_field()}}
    <div class="alert alert-danger">
      <strong>Warning!</strong> You are about to delete a user.  This action cannot be undone. Are you sure you want to continue?
    </div>

    <button type="submit" class="btn btn-danger">Yes delete this user!</button>

    <a href="{{route('backend.users.index')}}" class="btn btn-success">
      <strong>No, get me out of here!</strong>
    </a>
  </form>

@endsection
