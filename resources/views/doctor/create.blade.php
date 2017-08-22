@extends('template.maindoctor')
@section('title', 'Crear Doctor')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')

@section('content')
	{!! Form::open(['route' => 'doctor.store', 'method' => 'POST','files' => true]) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre(s)', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('lastname','Apellidos') !!}
			{!! Form::text('lastname',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico') !!}
			{!! Form::email('email',null,['class' => 'form-control','placeholder' => 'ejemplo@algo.com (no usar ñ)', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			{!! Form::password('password',['class' => 'form-control','placeholder' => '*******', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('age','Edad') !!}
			{!! Form::number('age',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('sex','Genero') !!}
			{!! Form::select('sex', [ 'M' => 'Masculino', 'F' => 'Femenino'],null ,['class' => 'form-control',
			'placeholder' => 'Seleccione una opción...','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('specialty','Especialidad') !!}
			{!! Form::text('specialty',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('schedule','Horario') !!}
			{!! Form::text('schedule',null,['class' => 'form-control', 'placeholder' => '(días hora) Ejemplo: L,M,M,J,V 9-13', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('professional_id','Cédula') !!}
			{!! Form::text('professional_id',null,['class' => 'form-control', 'required']) !!}
		</div>
    <div class="form-group">
			{!! Form::label('telephone_number','Numero de Telefono') !!}
			{!! Form::tel('telephone_number',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('office_address','Direccion') !!}
			{!! Form::text('office_address',null,['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
    		{!! Form::label('photo', 'Foto') !!}
    		{!! Form::file('photo',null,['class' => 'form-control']) !!}
  	</div>

		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection
