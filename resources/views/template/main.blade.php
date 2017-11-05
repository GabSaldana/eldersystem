<!DOCTYPE html>
<!-- Este template sirve para la página principal-->
<html lang="es">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP STYLES-->
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
	<!--API STYLES-->
  <!--link rel="stylesheet" type="text/css" href="{{ asset('css/sidemenu-style.css') }}"-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
  
  <!--Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<!-- Chosen -->
	<link href="{{ asset('plugins/chosen/chosen.css') }}" rel="stylesheet">
  <!--Font Awesome-->
  <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

</head>

<body>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	<!--FONT AWESOME>
	<script src="https://use.fontawesome.com/3c4bc4c435.js"></script-->
 <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
 <script src="{{ asset('plugins/jquery/jquery-3.1.1.js') }}"></script>
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
 <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
 <!-- Chosen -->
 <script src="{{ asset('plugins/chosen/chosen.jquery.js') }} "></script>
 <!--Trumbowyg-->
 <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.js') }} "></script>
 <!--JS Sidemenu-->
 <script src="{{ asset('js/sidemenu-js/modernizr.js') }} "></script>
 <script src="{{ asset('js/sidemenu-js/smoothscroll.js') }} "></script>
 <script src="{{ asset('js/sidemenu-js/custom.js') }} "></script>
</body>
</html>
