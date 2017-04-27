<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') &mdash; Laravel CMS</title>
    <link rel="stylesheet" href="{{ theme('/css/app.css') }}">
    <script type="text/javascript">
      window.Laravel =
      @php
        echo json_encode([
          'csrfToken' => csrf_token(),
        ]);
      @endphp
    </script>
    <script src="{{ theme('/js/app.js') }}"></script>
  </head>
  <body>
    <nav class="navbar navbar-static-top navbar-inverse">
      <div class="container">
        <div class="navbar-header"><a href="/" class="navbar-brand">Laravel CMS</a></div>
        <ul class="nav navbar-nav">
          <li><a href="{{ route('backend.users.index') }}">Users</a></li>
          <li><a href="{{ route('backend.pages.index') }}">Pages</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><span class="navbar-text">Hello, {{ ($admin) ? $admin->name : 'None'}}</span></li>
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
  </body>
</html>
