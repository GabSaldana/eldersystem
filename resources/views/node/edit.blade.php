@extends('template.maintemp')

@section('title', 'Editar Nodo')

@section('content')

	<table class="table">
		<thead class="colorhead">
			<th>Paciente</th>
			<th>Variable</th>
			<th></th>
		</thead>
		<tbody>

			@foreach($nodes as $node)
			<tr class="colorow">
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
					<a href="{{ route('node.destroyvar',['variable'=>$node->idvar,'user'=>$node->idusr]) }}"
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
