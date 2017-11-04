@extends('template.maintemp')

@section('title', 'Ver Doctor')

@section('title', 'Editar Doctor '.$doctor->name.' '.$doctor->lastname)

@section('content')
<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8 show" style="color:#616161;">
			<div class="form-group text-center">
				{{Html::image(asset($doctor->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
			</div>
			<div class="form-group">
				{!! Form::label('name','Nombre: '.$doctor->name) !!}
			</div>
			<div class="form-group">
				{!! Form::label('email','Correo Electronico: '.$doctor->email) !!}
			</div>
			<div class="form-group">
				{!! Form::label('age','Edad: '.$doctor->age . ' años') !!}
			</div>
			<div class="form-group">
				@if($doctor->sex == 'M')
						{!! Form::label('sex','Genero: '.'Masculino') !!}
				@else
						{!! Form::label('sex','Genero: '.'Femenino') !!}
				@endif
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
	</div>
	<div class="col-md-2">
	</div>
</div>

@endsection
