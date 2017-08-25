@extends('template.mainpaciente')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de doctores')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Lista de Variables')
@section('title', 'Editar nodo '.$node->mac_address)

@section('content')
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
						<a href="{{ route('node.edit', $node->id)}}" class="btn btn-warning">
							<span class="fa fa-pencil fa-lg" ></span>
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
