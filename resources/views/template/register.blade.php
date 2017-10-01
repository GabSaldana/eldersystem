<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro</title>
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  <!--FONT AWESOME-->
  <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

</head>

<!--body style="background-image: {{ asset('plugins/images/website/pattern.png') }}"-->
<!--body style="background-color: #4DB6AC"-->
<body>

  <div class="container">
    <div class="row main">
				<div class="main-login main-center">
				      <h5>Regitro para médicos.</h5>
              @yield('content')
      </div>
    </div>
  </div>

  <script src="{{ asset('plugins/jquery/jquery-2.1.3.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>


</body>
</html>
