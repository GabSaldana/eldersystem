@extends('template.maintemp')

@section('title', 'Crear Nodo')

@section('content')
	{!! Form::open(['route' => 'node.store', 'method' => 'POST', 'files'=>true]) !!}
	  <div class="form-group">
			{!! Form::label('mac_address','Dirección física:') !!}
			{!! Form::text('mac_address',null,['class' => 'form-control','placeholder' => '127.0.0.0', 'required']) !!}
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
