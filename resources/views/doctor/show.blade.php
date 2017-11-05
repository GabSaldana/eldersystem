@extends('template.maintemp')

@section('title', 'Ver Doctor')

@section('title', 'Editar Doctor '.$doctor->name.' '.$doctor->lastname)

@section('content')
<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8 show card hovercard" style="color:#616161;">
		<div class="cardheader">

		</div>
			<div class="form-group text-center avatar">
				{{Html::image(asset($doctor->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
			</div>
			<div class="info">
				<div class="form-group title">
					{!! Form::label('name',''.$doctor->name) !!}
				</div>
				<div class="form-group desc">
					{!! Form::label('email','Correo Electronico: '.$doctor->email) !!}
				</div>
				<div class="form-group desc">
					{!! Form::label('age','Edad: '.$doctor->age . ' años') !!}
				</div>
				<div class="form-group desc">
					@if($doctor->sex == 'M')
							{!! Form::label('sex','Genero: '.'Masculino') !!}
					@else
							{!! Form::label('sex','Genero: '.'Femenino') !!}
					@endif
				</div>
				<div class="form-group desc">
					{!! Form::label('specialty','Especialidad: '.$doctor->specialty) !!}
				</div>
				<div class="form-group desc">
					{!! Form::label('schedule','Horario: '.$doctor->schedule) !!}
				</div>
				<div class="form-group desc">
					{!! Form::label('professional_id','Cédula: '.$doctor->professional_id) !!}
				</div>
				<div class="form-group desc">
					{!! Form::label('telephone_number','Numero de Telefono: '.$doctor->telephone_number) !!}
				</div>
				<div class="form-group desc">
					{!! Form::label('office_address','Direccion de la Oficina: '.$doctor->office_address) !!}
				</div>
			</div>
	</div>
	<div class="col-md-2">
	</div>
</div>

@endsection
