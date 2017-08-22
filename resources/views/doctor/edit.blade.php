@extends('template.maindoctor')
@section('title', 'Crear Doctor')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')
@section('title', 'Editar Doctor '.$doctor->name.' '.$doctor->lastname)

@section('content')
	{!! Form::open(['route' => ['doctor.update', $doctor->id], 'method' => 'PUT', 'files' => true ]) !!}

		<div class="form-group">
			{{ Html::image( asset($doctor->photo) , 'a picture',
			 array('class' => 'thumb', 'width' => 200, 'height' => 200 )) }}
		</div>
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$doctor->name,['class' => 'form-control','placeholder' => 'Nombre(s)', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('lastname','Apellidos') !!}
			{!! Form::text('lastname',$doctor->lastname,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico') !!}
			{!! Form::email('email',$doctor->email,['class' => 'form-control','placeholder' => 'ejemplo@algo.com', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('age','Edad') !!}
			{!! Form::number('age',$doctor->age,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('sex','Genero') !!}
			{!! Form::select('sex', [ 'M' => 'Masculino', 'F' => 'Femenino'],$doctor->sex ,['class' => 'form-control',
			'placeholder' => 'Seleccione una opción...','required']) !!}
		</div>
    <div class="form-group">
			{!! Form::label('specialty','Especialidad') !!}
			{!! Form::text('specialty',$doctor->specialty,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('schedule','Horario') !!}
			{!! Form::text('schedule',$doctor->schedule,['class' => 'form-control', 'placeholder' => '(días hora) Ejemplo: L,M,M,J,V 9-13', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('professional_id','Cédula') !!}
			{!! Form::text('professional_id',$doctor->professional_id,['class' => 'form-control', 'required']) !!}
		</div>
    <div class="form-group">
			{!! Form::label('telephone_number','Numero de Telefono') !!}
			{!! Form::tel('telephone_number',$doctor->telephone_number,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('office_address','Direccion') !!}
			{!! Form::text('office_address',$doctor->office_address,['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
    		{!! Form::label('photo', 'Foto') !!}
    		{!! Form::file('photo',null,['class' => 'form-control']) !!}
  	</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection
