@extends('template.maintemp')

@section('title', 'Lista de Nodos')

@section('content')

	<table class="table">
		<thead>
			<!--th>ID</th-->
			<th>Dirección Fisica</th>
		</thead>
		<tbody>
			@foreach($nodes as $node)
				<tr class="shownot">
					<!--td>{{ $node->id }}</td-->
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
