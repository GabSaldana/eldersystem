@extends('template.mainpaciente')
@section('title', 'Crear Notificacion')

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Lista de Variables')

@section('content')
	{!! Form::open(['route' => 'notification.store', 'method' => 'POST', 'files'=>true]) !!}
	<div class="form-group">
		{!! Form::label('patient_id','Paciente') !!}
		{!! Form::select('patient_id',$patient,['class' => 'form-control textarea-content','placeholder' => 'Para que paciente?']) !!}
	</div>
		<div class="form-group">
			{!! Form::label('type','Tipo') !!}
			{!! Form::text('type',null,['class' => 'form-control','placeholder' => 'Normal|Urgente', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('description','Descripción') !!}
			{!! Form::textarea('description',null,['class' => 'form-control textarea-content','placeholder' => 'Descripcion de notificacion']) !!}
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
