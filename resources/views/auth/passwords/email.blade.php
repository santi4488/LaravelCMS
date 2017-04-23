@extends('layouts.auth')

@section('title', 'Password Reset')

@section('heading', 'Please provide your e-mail to reset your password.')

@section('content')
  <form class="" role="form" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="control-label">E-Mail Address</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group text-right">
        <a href="{{ route('login')}}"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back to login</a>
      </div>
      <div class="form-group text-right">

        <button type="submit" class="btn btn-primary">
            Send Password Reset Link
        </button>
      </div>
  </form>
@endsection
