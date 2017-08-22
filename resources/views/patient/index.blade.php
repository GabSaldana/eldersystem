@extends('template.maindoctor')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('patient.create') }}" class="btn btn-info">Nuevo Paciente</a><hr>
		</div>
		<div class="col-md-6">
			<!-- BUSCADOR-->
			{!! Form::open(['route' => 'patient.index', 'method' => 'GET', 'class' => 'navbar-form pull-center']) !!}
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
					{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Buscar paciente...', 'aria-describedby' => 'search']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

	<table class="table">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Foto</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($patients as $patient)
				<tr>
					<td>{{ $patient->id }}</td>
					<td>{{ $patient->name }}</td>
					<td>{{ $patient->lastname }}</td>
					<td>{{ $patient->telephone_number }}</td>
					<td>{{  Html::image(asset($patient->photo), 'a picture', array('width' => 50 , 'height' => 50, 'class' => 'thumb'))  }}</td>
					<td>
						<a href="{{ route('patient.destroy', $patient->id) }}"
						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
						<a href="{{ route('patient.edit', $patient->id)}}" class="btn btn-warning">
							<span class="fa fa-pencil fa-lg" ></span>
						</a>
						<a href="{{ route('patient.show', $patient->id)}}" class="btn btn-primary">
							<span class="fa fa-eye fa-lg" ></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $patients->render() !!}
	</div>
@endsection
