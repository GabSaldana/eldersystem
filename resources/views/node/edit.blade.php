@extends('template.maintemp')

@section('title', 'Editar Nodo')

@section('content')

	<table class="table">
		<thead>
			<th>Paciente</th>
			<th>Variable</th>
		</thead>
		<tbody>

			@foreach($nodes as $node)
			<tr>
				<td>{{ $node -> user }}</td>
				<td>{{ $node -> variable }}</td>
				<td>
				<!--	{!! Form::open(['action' => ['NodeController@destroyvar', $node->variable, $node->user], 'method' => 'delete']) !!}
  					{!! Form::submit('Delete') !!}
					{!! Form::close() !!}-->
					<!--a href="{{ url('node/'.$node->variable.'/'.$node->user.'/destroyvar') }}"
					onclick="return confirm('Eliminar esta variable?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a-->
					<a href="{{ route('node.destroyvar',['variable'=>$node->variable,'user'=>$node->user]) }}"
					onclick="return confirm('Eliminar esta variable?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
			@endforeach
			<a href="{{ route('node.add') }}" class="btn btn-info">Añadir variable a paciente</a><hr>
		</tbody>
	</table>
@endsection
