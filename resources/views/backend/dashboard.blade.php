@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
  <div class="container">
    <dashboard :posts="{{$posts}}" :users="{{$users}}"></dashboard>
  </div>
@endsection
