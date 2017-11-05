@extends('template.maintemp')

@section('title', 'Lista de pacientes')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('patient.create') }}" class="btn btn-info">Nuevo Paciente</a><hr>
		</div>
		<div class="col-md-6">
			<!-- BUSCADOR-->
			{!! Form::open(['route' => 'admin.dashboard', 'method' => 'GET', 'class' => 'navbar-form pull-center']) !!}
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

<div class="row">
			@foreach($patients as $patient)
				<div class="col-md-4">
					</br>
					<center>
					<div class="index-userpic">{{ Html::image( asset($patient->photo) , 'a picture',
					 array('class' => 'thumb', 'width' => 50, 'height' => 50 )) }}
				 </br><h4> {{$patient->name .' '. $patient->lastname}}</h4></br>
				 </div>
					<td >
						<a href="{{ route('patient.destroy', $patient->id) }}"
						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn-circle btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
						<a href="{{ route('patient.edit', $patient->id)}}" class="btn-circle btn-warning">
							<span class="fa fa-pencil fa-lg" ></span>
						</a>
						<a href="{{ route('patient.show', $patient->id)}}" class="btn-circle btn-primary">
							<span class="fa fa-eye fa-lg" ></span>
						</a>
						</br>
					</td>
				</center>
				</div>
			@endforeach
</div>

<div class="row">
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $patients->render() !!}
	</div>
</div>

@endsection
