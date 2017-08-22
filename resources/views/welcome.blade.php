@extends('template/main')

@section('title','Inicio')

<nav class="navbar">
  <div class="container-fluid">
    @if (Route::has('login'))
    <div class="navbar-header">
      @if (Auth::check())
      <a class="navbar-brand" href="{{ url('/home') }}">PonteEnLinea</a>
      @else
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ url('/login') }}"><span class="fa fa-user fa-2x icono-blanco"></span> Inicia Sesión</a></li>
      <li><a href="https://www.facebook.com/gab.saldana"><span class="fa fa-facebook-official fa-2x icono-blanco"></span> Visitanos</a></li>
    </ul>
    @endif
  </div>
  @endif
</nav>

<div class="container">
  <div class="row">
    <div class="jumbotron">
      <h1 align="center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>
        Ponte en línea
      <i class="fa fa-users" aria-hidden="true"></i></h1>
        <p>FALTA IMAGEN</p>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <figure align="center"><i class="fa fa-heartbeat fa-5x icono-blanco" aria-hidden="true"></i></figure>
      <p>El pulso cardiaco es de nuestros signos más importantes...</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <figure align="center"> <i class="fa fa-thermometer-half fa-5x icono-blanco" aria-hidden="true"></i></figure>
      <p>LA temperatura es el signo vital</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <figure align="center"> <i class="fa fa-wifi fa-5x icono-blanco" aria-hidden="true"></i> </figure>
      <p>El internet con ayuda de el pulso y la temperatura nos ayudará</p>
    </div>
  </div>
</div>
