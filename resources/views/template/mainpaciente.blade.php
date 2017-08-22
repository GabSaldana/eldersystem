<!DOCTYPE html>
<html lang="es">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP STYLES-->
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
	<!--API STYLES-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/prueba.css') }}">
	<!-- Chosen -->
	<link href="{{ asset('plugins/chosen/chosen.css') }}" rel="stylesheet">
	<!--Trumbowyg-->
	<link href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css') }}" rel="stylesheet">
  <!--FONT AWESOME-->
  <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

</head>

<body >

		@include('template.partials.nav')

	<div class="container-fluid ">
  		<div class="row ">
			<!-- MENU -->
			<div class="col-md-3 sidemenu" >
				@include('template.partials.sidemenupaciente')
			</div>
			<!-- END MENU -->
			<!--CONTENT-->
			<div class="col-md-9 profile-content">
				@include('flash::message')
				@include('template.partials.errors')
				@yield('content')
			</div>
		</div>
	</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	<!--FONT AWESOME-->
	<!--script src="https://use.fontawesome.com/3c4bc4c435.js"></script-->
 <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
 <script src="{{ asset('plugins/jquery/jquery-3.1.1.js') }}"></script>
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
 <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
 <!-- Chosen -->
 <script src="{{ asset('plugins/chosen/chosen.jquery.js') }} "></script>
 <!--Trumbowyg-->
 <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.js') }} "></script>
</body>
</html>
