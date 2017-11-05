@extends('template.maintemp')

@section('title', 'Editar Paciente '.$patient->name.' '.$patient->lastname)

@section('content')

<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8 show card hovercard" style="color:#616161;">
		<div class="cardheaderD">

		</div>
		{!! Form::open(['route' => ['patient.updatesee', $patient->id], 'method' => 'PUT','files'=>true]) !!}
			<div class="form-group text-center avatarD">
					 {{Html::image(asset($patient->photo), 'a picture', array('width' => 200 , 'height' => 200, 'class' => 'thumb'))}}
				</div>
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}
				{!! Form::text('name',$patient->name,['class' => 'form-control','placeholder' => 'Nombre(s)', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('lastname','Apellidos') !!}
				{!! Form::text('lastname',$patient->lastname,['class' => 'form-control', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('email','Correo Electronico') !!}
				{!! Form::email('email',$patient->email,['class' => 'form-control','placeholder' => 'ejemplo@algo.com', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('age','Edad') !!}
				{!! Form::number('age',$patient->age,['class' => 'form-control', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('sex','Genero') !!}
				{!! Form::select('sex', [ 'M' => 'Masculino', 'F' => 'Femenino'],$patient->sex ,['class' => 'form-control',
				'placeholder' => 'Seleccione una opción...','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('height','Estatura') !!}
				{!! Form::text('height',$patient->height,['class' => 'form-control', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('weight','Peso') !!}
				{!! Form::text('weight',$patient->weight,['class' => 'form-control', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('telephone_number','Numero de Telefono') !!}
				{!! Form::tel('telephone_number',$patient->telephone_number,['class' => 'form-control', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('address','Direccion') !!}
				{!! Form::text('address',$patient->address,['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('short_description','Información médica') !!}
				{!! Form::textarea('short_description',$patient->short_description,['class' => 'form-control','placeholder' => 'Describa las características importantes acerca de su salud']) !!}
			</div>
			<div class="form-group">
					{!! Form::label('photo', 'Foto') !!}
					{!! Form::file('photo',null,['class' => 'form-control']) !!}
				</div>
			<div class="form-group">
				{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
	<div class="col-md-2">
	</div>
</div>

@endsection
