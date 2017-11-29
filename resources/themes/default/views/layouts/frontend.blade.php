<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') &mdash; Laravel CMS</title>
    <link rel="stylesheet" type="text/css" href="{{theme('/css/frontend.css')}}">
    <script type="text/javascript">
      window.Laravel =
      @php
        echo json_encode([
          'csrfToken' => csrf_token(),
        ]);
      @endphp
    </script>
    <script src="{{ theme('/js/frontend/app.js') }}"></script>
  </head>
  <body id="app">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">
            <img src="{{theme('/images/my_logo.png')}}" alt="Laravel CMS">
          </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            @include('partials.navigation')
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" >
      <div class="row">
        <div class="col-md-12">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
