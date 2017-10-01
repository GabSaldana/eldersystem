@extends('template.maintemp')
@section('title', 'Añadir variable')

@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')

@section('content')

{!! Form::open(['route' => 'node.storeunique', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('patient_id','Paciente') !!}
		{!! Form::select('patient_id',$patient,['class' => 'form-control textarea-content']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('variable_id','Variable a medir') !!}
		{!! Form::select('variable_id',$variable,['class' => 'form-control textarea-content']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Añadir',['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}
@endsection

@section('js')
<script>
	$('.textarea-content').trumbowyg();
</script>
@endsection
