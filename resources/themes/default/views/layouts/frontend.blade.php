<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') &mdash; Laravel CMS</title>
    <link rel="stylesheet" type="text/css" href="{{theme('/css/frontend.css')}}">
  </head>
  <body id="app">
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">
            <img src="{{theme('/images/logo.png')}}" alt="Laravel CMS">
          </a>
        </div>
        <ul class="nav navbar-nav">
          @include('partials.navigation')
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
