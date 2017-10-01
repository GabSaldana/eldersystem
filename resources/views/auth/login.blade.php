
@extends('template.login')
@section('title','login-user')
@section('content')


<div class="form">
    <div class="tab-content">
                <div id="login">
                  <h1>Bienvenido!</h1>
                    <form  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} field-wrap">
                            <label for="email" class="col-md-4 req">Correo Electrónico</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} field-wrap">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                
                                <p class="forgot ">
                                  <a class="btn btn-link" href="{{ route('admin.login') }}">
                                      ¿Eres doctor?
                                  </a>
                                </p>
                                <button type="submit" class="button button-block">
                                    Entrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection
