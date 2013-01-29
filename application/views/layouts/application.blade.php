<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel-REST</title>
</head>
<body>
  <h1>Laravel-REST</h1>
  
  @if ( Session::get('notice') )
  <p id="notice">{{ Session::get('notice') }}</p>
  @endif

  @yield('content')
</body>
</html>