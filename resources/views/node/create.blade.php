@extends('template.mainpaciente')
@section('title', 'Crear Nodo')

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Lista de Variables')

@section('content')
	{!! Form::open(['route' => 'node.store', 'method' => 'POST', 'files'=>true]) !!}
	  <div class="form-group">
			{!! Form::label('mac_address','Dirección física:') !!}
			{!! Form::text('mac_address',null,['class' => 'form-control','placeholder' => '127.0.0.0', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection

@section('js')
  <script>
    $('.textarea-content').trumbowyg();
  </script>
@endsection
