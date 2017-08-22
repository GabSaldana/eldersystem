@extends('template.mainpaciente')
@section('title', $patient->name.' '.$patient->lastname)

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Lista de Variables')

@section('content')

		<div class="form-group">
    		{{Html::image(asset($patient->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
  	</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico: '.$patient->email) !!}
		</div>
		<div class="form-group">
			{!! Form::label('age','Edad: '.$patient->age) !!}
		</div>
		<div class="form-group">
			{!! Form::label('sex','Genero: '.$patient->sex) !!}
		</div>
		<div class="form-group">
			{!! Form::label('height','Estatura: '.$patient->height) !!}
		</div>
		<div class="form-group">
			{!! Form::label('weight','Peso: '.$patient->weight) !!}
		</div>
		<div class="form-group">
			{!! Form::label('telephone_number','Numero de Telefono: '.$patient->telephone_number) !!}
		</div>
		<div class="form-group">
			{!! Form::label('address','Direccion: '.$patient->address) !!}
		</div>
		<div class="form-group">
			{!! Form::label('short_description','Información médica: '.$patient->short_description) !!}
		</div>

@endsection
