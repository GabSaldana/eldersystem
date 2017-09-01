<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <!--link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'-->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"-->
  <!--link rel="stylesheet" href="css/login-style.css"-->
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
</head>

<body>

  @yield('content')

  <!--script src="{{ asset('plugins/jquery/jquery-3.1.1.js') }}"></script-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!--script src="js/login-js/index.js"></script-->
  <script src="{{ asset('js/login-js/index.js') }}"></script>

</body>
</html>
