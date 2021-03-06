@extends('template.maintemp')

@section('title', 'Crear Paciente')

@section('content')
	{!! Form::open(['route' => 'patient.store', 'method' => 'POST', 'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('mac_address','Nodo') !!}
			{!! Form::text('mac_address',null,['class' => 'form-control', 'placeholder' => 'Dirección física: 127.0.0.1', 'required']) !!}
		</div>
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
			{!! Form::label('height','Estatura') !!}
			{!! Form::text('height',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('weight','Peso') !!}
			{!! Form::text('weight',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('telephone_number','Numero de Telefono') !!}
			{!! Form::tel('telephone_number',null,['class' => 'form-control', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('address','Direccion') !!}
			{!! Form::text('address',null,['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('short_description','Información médica') !!}
			{!! Form::textarea('short_description',null,['class' => 'form-control textarea-content','placeholder' => 'Describa las características importantes acerca de su salud']) !!}
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

@section('js')
  <script>
    $('.textarea-content').trumbowyg();
  </script>
@endsection
