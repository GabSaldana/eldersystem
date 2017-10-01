@if(Auth::guard('web')->check())
{{-- dd( Auth::guard('web')->check() ) --}}
{{-- dd('hi user') --}}
<nav class="navbar">
  		<div >
    		<div class="navbar-header">
    			<div class="">
    				<a class="navbar-brand brand" href="#">
      					<span class="fa fa-heartbeat fa-2x icono-blanco"  aria-hidden="true"></span>
      				</a>
    			</div>
    		</div>
      <ul class="nav navbar-nav navbar-right">
      			<li><a href="{{ route('user.logout')}}" style=""><span class="fa fa-sign-out fa-2x icono-blanco "></span>
      			{{ Auth::user()->name}}</a></li>
    	</ul>
    </div>
</nav>

@else
{{-- dd( Auth::guard('admin')->check() ) --}}
{{-- dd('hi admin') --}}
{{-- dd(Auth::guard('admin')->check()) --}}
<nav class="navbar">
  		<div >
    		<div class="navbar-header">
    			<div class="">
    				<a class="navbar-brand brand" href="#">
      					<span class="fa fa-heartbeat fa-2x icono-blanco"  aria-hidden="true"></span>
      				</a>
    			</div>
    		</div>
      <ul class="nav navbar-nav navbar-right">
      			<li><a href="{{ route('admin.logout')}}" style=""><span class="fa fa-sign-out fa-2x icono-blanco "></span>
      			{{ Auth::guard('admin')->user()->name }}</a></li>
    	</ul>
    </div>
</nav>

@endif
