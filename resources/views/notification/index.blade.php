@extends('template.maintemp')

@section('title', 'Lista de motificaciones')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!--Link hacia el formulario de Doctor-->
			<a href="{{ route('notification.create') }}" class="btn btn-info">Nueva notificacion</a><hr>
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
			<!--th>ID</th-->
			<th>Tipo</th>
			<th>Descripción</th>
			<th>Paciente</th>
			<th>Foto de perfil paciente</th>
		</thead>
		<tbody>
			@foreach($notifications as $notification)
				<tr class="shownot">
						<!--td>{{ $notification->id }}</td-->
						<td>{{ $notification->type }}</td>
						<td>{{ $notification->description }}</td>
						<td>{{ $notification->name }}</td>
						<td >{{ Html::image( asset($notification->photo) , 'a picture',
						 array('class' => 'thumb', 'width' => 50, 'height' => 50 )) }}
					 </td>
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
