@extends('layouts.backend')

@section('title', 'Create New User')

@section('content')

  <form method="POST" action="{{ route('backend.users.store') }}">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label for="email">E-mail</label>
      <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" class="form-control" type="password" name="password">
    </div>

    <div class="form-group">
      <label for="password_confirmation">Password Confirmation</label>
      <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
    </div>

    <button type="submit"class="btn btn-primary">
      Create New User
    </button>

  </form>

@endsection
