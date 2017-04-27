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
    <div class="container">
      <div class="row vertical-center">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="panel panel-{{$errors->any() ? 'danger' : 'default'}}">
            <div class="panel-heading">
              <h2 class="panel-title">
                @yield('heading')
              </h2>
            </div>
            <div class="panel-body">
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
        <div class="col-md-4"></div>
      </div>
    </div>
  </body>
</html>
