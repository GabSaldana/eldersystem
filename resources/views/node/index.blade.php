@extends('template.maindoctor')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')

@section('content')

<!-- BUSCADOR-->
{!! Form::open(['route' => 'node.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
		{!! Form::text('mac_address',null,['class' => 'form-control','placeholder' => 'Buscar nodo...', 'aria-describedby' => 'search']) !!}
	</div>
</div>
{!! Form::close() !!}


<a href="{{ route('node.create') }}" class="btn btn-info">Nuevo Nodo</a><hr>
	<table class="table">
		<thead>
			<th>ID</th>
			<th>Dirección Fisica</th>
		</thead>
		<tbody>
			@foreach($nodes as $node)
				<tr>
					<td>{{ $node->id }}</td>
					<td>{{ $node->mac_address }}</td>
					<td>
						<a href="{{ route('node.destroy', $node->id) }}"
						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $nodes->render() !!}
	</div>
@endsection
