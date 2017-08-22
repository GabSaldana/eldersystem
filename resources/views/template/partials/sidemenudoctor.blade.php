@if(Auth::guard('admin')->check())
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
								<!--li class="">
							    <a href="{!! route( 'doctor.show', Auth::id() ) !!}">
							    	<span class="fa fa-user fa-2x icono-blanco"></span>&nbsp;@yield('Datos personales','Default')
							    </a>
						    </li -->

						    <li class="active">
							    <a href="{{ route('patient.index') }}">
							    	<span class="fa fa-list fa-2x icono-blanco"></span>&nbsp;@yield('Lista','Default')
							    </a>
						    </li>
						    <li class="">
							    <a href="{{ route('notification.index') }}">
							    <span class="fa fa-exclamation-circle fa-2x icono-blanco"></span>&nbsp;@yield('Sub menu 1','Default')
							     </a>
						    </li>
                     		<li class="">
							    <a href="{{ route('node.index') }}">
							     <span class="fa fa-dot-circle-o fa-2x icono-blanco"></span>&nbsp;@yield('Sub menu 2','Default')
							    </a>
						    </li>
					    </ul>
				   </div>
</div>
@endif
