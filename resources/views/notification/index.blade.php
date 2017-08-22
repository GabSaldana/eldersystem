@extends('template.mainpaciente')

@section('title', 'Notificaciones')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Lista de Variables')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!--Link hacia el formulario de Doctor-->
			<a href="{{ route('doctor.create') }}" class="btn btn-info">Nueva notificacion</a><hr>
		</div>
		<div class="col-md-6">
			<!-- BUSCADOR-->
			{!! Form::open(['route' => 'notification.index', 'method' => 'GET', 'class' => 'navbar-form pull-center']) !!}
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
					{!! Form::text('type',null,['class' => 'form-control','placeholder' => 'Buscar notificacion...', 'aria-describedby' => 'search']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

	<table class="table">
		<thead>
			<th>ID</th>
			<th>Tipo</th>
			<th>Descripción</th>
		</thead>
		<tbody>
			@foreach($notifications as $notification)
				<tr>
					<td>{{ $notification->id }}</td>
					<td>{{ $notification->type }}</td>
					<td>{{ $notification->description }}</td>
					<td>
						<a href="{{ route('notification.destroy', $notification->id) }}"
						onclick="return confirm('Seguro que deseas eliminarla?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $notifications->render() !!}
	</div>
@endsection
