@extends('template.maintemp')

@section('title', 'Lista de motificaciones')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!--Link hacia el formulario de Notificacion nueva-->
			<!--a href="{{ route('notification.create') }}" class="btn btn-info">Nueva notificacion</a><hr-->
		</div>
		<div class="col-md-6">
			<!-- BUSCADOR-->
			{!! Form::open(['route' => 'notification.index', 'method' => 'GET', 'class' => 'navbar-form pull-center']) !!}
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
					{!! Form::text('type',null,['class' => 'form-control','placeholder' => 'Busca por tipo o paciente', 'aria-describedby' => 'search']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

	<table class="table ">
		<thead style="font-size:16px;" class="shownot colorhead">
			<!--th>ID</th-->
			<th>Tipo</th>
			<th>Descripción</th>
			<th>Paciente</th>
			<th></th>
			<th></th>
			<!--th>Foto de perfil paciente</th-->
		</thead></br>
		<tbody>
			@foreach($notifications as $notification)
				<tr class="shownot colorow">
						<!--td>{{ $notification->id }}</td-->
						<td ><b>{{ $notification->type }}</b></td>
						<td>{{ $notification->description }}</td>
						<td>{{ $notification->name .' '. $notification->lastname }}</td>
						<td >{{ Html::image( asset($notification->photo) , 'a picture',
						 array('class' => 'thumb', 'width' => 50, 'height' => 50 )) }}
					 </td>
						<td>
							<div style="margin-top:12px;">
								<a href="{{ route('notification.destroy', $notification->id) }}"
								onclick="return confirm('Seguro que deseas eliminarla?')" class="btn-circle btn-danger">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</a>
							</div>
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

@section('js')
  <script>
	/*ROJO, AZUL VERDE, NARANJA, MORADO*/
	var colors2 = ['#F44336', '#0091EA', '#3F51B5', '#9C27B0', '#43A047', '#F57C00'];
	$('.colorhead').css('color','#FFFFFF');
	$('.colorhead').css('background-color', colors2[Math.floor(Math.random() * colors2.length)]);

	var colors = ['#FFF'];
	$('.colorow').each(function() {
		$('.colorow').css('color','#004D40');
    $(this).css('background-color', colors[Math.floor(Math.random() * colors.length)]);
	});
  </script>
@endsection
