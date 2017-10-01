@if(Auth::guard('admin')->check())
{{-- dd( Auth::guard('admin')->check() ) --}}
{{-- dd( Auth::guard('admin')->user()->id ) --}}
{{--dd('hi admin') --}}

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')

<div class="profile-sidebar">

					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
					        <img src="{{ asset(Auth::guard('admin')->user()->photo) }}" class="img-responsive" >
				    </div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
				    <div class="profile-usertitle" style="color:white;">
					    <div class="profile-usertitle-name" >{{ Auth::guard('admin')->user()->name }}</div>
					     <div class="profile-usertitle-job">{{ Auth::guard('admin')->user()->email }}</div>
				    </div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR MENU -->
				    <div class="profile-usermenu">
					    <ul class="nav">
								<li class="">
							    <a href="{!! route( 'doctor.see', Auth::guard('admin')->user()->id ) !!}">
							    	<span class="fa fa-user fa-2x icono-blanco"></span>&nbsp;@yield('Datos personales','Default')
							    </a>
						    </li >
						    <li class="">
							    <a href="{{ route('patient.index') }}">
							    	<span class="fa fa-list fa-2x icono-blanco"></span>&nbsp;@yield('Lista','Default')
							    </a>
						    </li>
						    <li class="notis">
							    <a href="{{ route('notification.index') }}">
							    <span class="fa fa-exclamation-circle fa-2x icono-blanco"></span>&nbsp;@yield('Sub menu 1','Default')
							     </a>
						    </li>
                <li class="node">
							    <a href="{{ route('node.index') }}">
							     <span class="fa fa-dot-circle-o fa-2x icono-blanco"></span>&nbsp;@yield('Sub menu 2','Default')
							    </a>
						    </li>
					    </ul>
				   </div>
</div>

@else
{{-- dd( Auth::guard('web')->check() ) --}}
{{-- dd('hi user') --}}

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Mediciones')

<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
					        <img src="{{ Auth::user()->photo }}" class="img-responsive" >
				    </div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
				    <div class="profile-usertitle" style="color:white;">
					    <div class="profile-usertitle-name" >{{ Auth::user()->name}}</div>
					     <div class="profile-usertitle-job">{{ Auth::user()->email}}</div>
				    </div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR MENU -->
				    <div class="profile-usermenu">
					    <ul class="nav">
								<li class="">
							    <a href="{!! route( 'patient.see', Auth::id() ) !!}">
							    	<span class="fa fa-user fa-2x icono-blanco"></span>&nbsp;@yield('Datos personales','Default')
							    </a>
						    </li -->
						    <li class="">
							    <a href="{{ route('doctor.index') }}">
							    	<span class="fa fa-list fa-2x icono-blanco"></span>&nbsp;@yield('Lista','Default')
							    </a>
						    </li>
						    <li class="">
							    <a href="{{ route('notification.index') }}">
							    <span class="fa fa-exclamation-circle fa-2x icono-blanco"></span>&nbsp;@yield('Sub menu 1','Default')
							     </a>
						    </li>
                     		<li class="">
							    <a href="{!! route('measure.show', Auth::id() ) !!}">
							     <span class="fa fa-dot-circle-o fa-2x icono-blanco"></span>&nbsp;@yield('Sub menu 2','Default')
							    </a>
						    </li>
					    </ul>
				   </div>
</div>

@endif
