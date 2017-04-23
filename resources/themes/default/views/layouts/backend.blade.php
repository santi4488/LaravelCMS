<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') &mdash; Laravel CMS</title>
    <link rel="stylesheet" href="{{ theme('/css/backend.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-static-top navbar-inverse">
      <div class="container">
        <div class="navbar-header"><a href="/" class="navbar-brand">Laravel CMS</a></div>
        <ul class="nav navbar-nav">
          <li><a href="#">Item 1</a></li>
          <li><a href="#">Item 2</a></li>
          <li><a href="#">Item 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><span class="navbar-text">Hello, {{ $admin->name }}</span></li>
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

        @yield('content')
      </div>
    </div>
  </body>
</html>
