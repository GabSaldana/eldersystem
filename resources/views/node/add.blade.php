@extends('template.maintemp')

@section('title', 'Añadir nodo')

@section('content')

{!! Form::open(['route' => 'node.update', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('patient_id','Paciente') !!}
		{!! Form::select('patient_id',$patient,['class' => 'form-control select-user']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('variable_id','Variable a medir') !!}
		{!! Form::select('variable_id',$variable,['class' => 'form-control select-var']) !!}
	</div>
	<p></p>
	<div class="form-group">
		{!! Form::submit('Añadir',['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}
@endsection

@section('js')
<script>
$(document).ready(function(){
	//var name = $( "#select-user option:selected" ).text();
	 //var x = document.myForm.txtname.value;
	//alert("name");
	$("p").text("Hello world!");
});

</script>
@endsection
