@extends('template.maintemp')

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

<div class="row">
			@foreach($doctors as $doctor)
				<div class="col-md-4">
					</br>
          <div class="index-userpic">{{ Html::image( asset($doctor->photo) , 'a picture',
					 array('class' => 'thumb', 'width' => 50, 'height' => 50 )) }}
				 </br><h4> {{$doctor->name .' '. $doctor->lastname}}</h4></br>
				 </div>
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
						</br>
					</td>
				</div>
			@endforeach
</div>

<div class="row">
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $doctors->render() !!}
	</div>
</div>

@endsection
