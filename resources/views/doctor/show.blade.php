@extends('template.maindoctor')
@section('title', 'Crear Doctor')

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')
@section('title', 'Editar Doctor '.$doctor->name.' '.$doctor->lastname)

@section('content')

		<div class="form-group">
			{{Html::image(asset($doctor->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico: '.$doctor->email) !!}
		</div>
		<div class="form-group">
			{!! Form::label('age','Edad: '.$doctor->age) !!}
		</div>
		<div class="form-group">
			{!! Form::label('sex','Genero: '.$doctor->sex) !!}
		</div>
		<div class="form-group">
			{!! Form::label('specialty','Especialidad: '.$doctor->specialty) !!}
		</div>
		<div class="form-group">
			{!! Form::label('schedule','Horario: '.$doctor->schedule) !!}
		</div>
		<div class="form-group">
			{!! Form::label('professional_id','Cédula: '.$doctor->professional_id) !!}
		</div>
		<div class="form-group">
			{!! Form::label('telephone_number','Numero de Telefono: '.$doctor->telephone_number) !!}
		</div>
		<div class="form-group">
			{!! Form::label('office_address','Direccion de la Oficina: '.$doctor->office_address) !!}
		</div>


@endsection
