@extends('template.maintemp')

@section('title', 'Añadir nodo')

@section('content')

{!! Form::open(['route' => 'node.update', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('patient_id','Paciente') !!}
		{!! Form::select('patient_id',$patient,['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('variable_id','Variable a medir') !!}
		{!! Form::select('variable_id',$variable,['class' => 'form-control ']) !!}
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
	$('#patient_id').click(function(){//cuando se le da click a una de las opciones se acciona
		var user_id = String($('#patient_id :selected').val());
		//alert(user_id); //debe haber un espacio en blanco entre el objeto y suevento
		$("p").text(user_id);
	});
});

</script>
@endsection
