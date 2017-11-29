<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') &mdash; Laravel CMS</title>
    <link rel="stylesheet" href="{{ theme('/css/backend.css') }}">
    <style media="screen">
    .table-hover > tbody > tr > .warning,
    .table-hover > tbody > .warning > td,
    .table-hover > tbody > .warning > th {
    background-color: #FAF2CC !important;
    }
    </style>
    <script type="text/javascript">
      window.Laravel =
      @php
        echo json_encode([
          'csrfToken' => csrf_token(),
        ]);
      @endphp
    </script>
    <script src="{{ theme('/js/backend/app.js') }}"></script>
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="/" class="navbar-brand">
              <img src="{{theme('/images/my_logo_dark.png')}}" alt="Laravel CMS">
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
              <li><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
              <li><a href="{{ route('backend.users.index') }}">Users</a></li>
              <li><a href="{{ route('backend.pages.index') }}">Pages</a></li>
              <li><a href="{{ route('backend.blog.index') }}">Blog Posts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <span class="navbar-text">Hello, {{ ($admin) ? $admin->name : 'None'}}</span>
              </li>
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row div col-md-12">
          <h3>@yield('title')</h3>

          @if($errors->any())
          <div class="alert alert-danger">
            <strong>We found some errors!</strong>
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if($status)
          <div class="alert alert-info">
            {{ $status }}
          </div>
          @endif

          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
