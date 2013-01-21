<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The Companies!</title>
</head>
<body>
  <h1>laravel-pierucci</h1>
  
  @if ( Session::get('notice') )
  <p id="notice">{{ Session::get('notice') }}</p>
  @endif

  @yield('content')
</body>
</html>