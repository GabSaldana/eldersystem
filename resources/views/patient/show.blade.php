@extends('template.maintemp')

@section('title', $patient->name.' '.$patient->lastname)

@section('content')

<div class="row">
	<div class="col-md-2">

	</div>
	<div class="col-md-8 show card hovercard" style="color:#616161;">
		<div class="cardheader">

		</div>
			<div class="form-group avatar text-center">
				{{Html::image(asset($patient->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
			</div>
			<div class="form-group title">
				{!! Form::label('name','Nombre: '.$patient->name . ' ' . $patient->lastname) !!}
			</div>
			<div class="form-group desc ">
				{!! Form::label('email','Correo Electronico: '.$patient->email) !!}
			</div>
			<div class="form-group desc ">
				{!! Form::label('age','Edad: '.$patient->age) !!}
			</div>
			<div class="form-group desc ">
				@if($patient->sex == 'M')
						{!! Form::label('sex','Genero: '.'Masculino') !!}
				@else
						{!! Form::label('sex','Genero: '.'Femenino') !!}
				@endif
			</div>
			<div class="form-group desc ">
				{!! Form::label('height','Estatura: '.$patient->height . ' cm') !!}
			</div>
			<div class="form-group desc ">
				{!! Form::label('weight','Peso: '.$patient->weight . ' kg') !!}
			</div>
			<div class="form-group desc ">
				{!! Form::label('telephone_number','Numero de Telefono: '.$patient->telephone_number) !!}
			</div>
			<div class="form-group desc ">
				{!! Form::label('address','Direccion: '.$patient->address) !!}
			</div>
			<div class="form-group desc ">
				{!! Form::label('short_description','Información médica: '.$patient->short_description) !!}
			</div>
			<div class="form-group">
				<a href="{{ route('measure.show', $patient->id) }}" class="btn btn-primary btn-lg btn-block">Ver varibales&nbsp;&nbsp;
					<span class="fa fa-line-chart" aria-hidden="true" ></span>
				</a>
			</div>
	</div>

</div>
@endsection
