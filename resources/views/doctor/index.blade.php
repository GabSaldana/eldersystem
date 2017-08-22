@extends('template.mainpaciente')

@section('title', 'Lista de Pacientes')
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
			<a href="{{ route('doctor.create') }}" class="btn btn-info">Nuevo Doctor</a><hr>
		</div>
		<div class="col-md-6">
			<!-- BUSCADOR-->
			{!! Form::open(['route' => 'doctor.index', 'method' => 'GET', 'class' => 'navbar-form pull-center']) !!}
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
					{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Buscar doctor...', 'aria-describedby' => 'search']) !!}
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
      <th>Horario</th>
      <th>Dirección de la oficina</th>
      <th>Foto</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($doctors as $doctor)
				<tr>
					<td>{{ $doctor->id }}</td>
					<td>{{ $doctor->name }}</td>
					<td>{{ $doctor->lastname }}</td>
					<td>{{ $doctor->telephone_number }}</td>
          <td>{{ $doctor->schedule }}</td>
          <td>{{ $doctor->office_address }}</td>
          <td>{{ Html::image( asset($doctor->photo) , 'a picture',
					 array('class' => 'thumb', 'width' => 50, 'height' => 50 )) }}
				  </td>
					<td>
						<a href="{{ route('doctor.destroy', $doctor->id) }}"
						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
						<a href="{{ route('doctor.edit', $doctor->id)}}" class="btn btn-warning">
							<span class="fa fa-pencil fa-lg" ></span>
						</a>
						<a href="{{ route('doctor.show', $doctor->id)}}" class="btn btn-primary">
							<span class="fa fa-eye fa-lg" ></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $doctors->render() !!}
	</div>
@endsection
