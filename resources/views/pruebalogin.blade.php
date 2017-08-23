@extends('template/login')
@section('title','login-user')
@section('content')

  <div class="form">
      <div class="tab-content">
        <div id="login">
          <h1>Bienvenido!</h1>
          <form method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class=" form-group{{ $errors->has('email') ? ' has-error' : '' }} field-wrap">
                  <label for="email" class="col-md-4 req">Correo Electrónico</label>
                  <input type="email" name="email"  required autocomplete="off"/>
                  <!--input type="email"required autocomplete="off"/-->
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>

              <div class=" form-group{{ $errors->has('password') ? ' has-error' : '' }} field-wrap">
                  <label for="email" class="col-md-4 req">Contraseña</label>
                  <input type="password" required autocomplete="off"/>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="row">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    ¿Olvidaste contraseña?
                  </a>
                <p class="forgot ">
                  <a class="btn btn-link" href="{{ route('admin.login') }}">
                      ¿Eres doctor?
                  </a>
                </p>
              </div>
              <button class="button button-block"/>Entrar</button>
          </form>
        </div>
      </div><!-- tab-content -->
  </div> <!-- /form -->

@endsection
