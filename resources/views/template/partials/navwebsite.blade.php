<div class="container">
  <nav class="navbar ">
    <div class="container-fluid">
    @if (Route::has('login'))
      <div class="navbar-header">
      @if (Auth::check())
      @else
      </div>

      <div class="brand-centered">
      <a class="navbar-brand" href="#"><img style="margin-right: 10px; padding: 0;"
        src="{{ asset('images/website/016-worldwide.png') }}" alt="">
      </a>
      </div>

      <div id="navbar9" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-left">
          <li><a href="https://www.facebook.com/gab.saldana"><span class="fa fa-facebook-official fa-3x icono-blanco">
          </span> Visitanos
          </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ url('/login') }}"><span class="fa fa-user fa-3x icono-blanco">
          </span> Inicia Sesión
          </a></li>
        </ul>
        @endif
      </div>
      @endif
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
