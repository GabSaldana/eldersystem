@extends('template.mainpaciente')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Lista de Variables')
@section('title', 'Editar nodo '.$node->mac_address)

@section('content')
	{!! Form::open(['route' => ['node.update', $node->id], 'method' => 'PUT','files'=>true]) !!}

		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection
