@extends('template.maintemp')

@section('title', 'Lista de Nodos')

@section('content')

	<table class="table">
		<thead style="background-color:#3F51B5; color:#FFF; font-size:16px;" class="shownot">
			<!--th>ID</th-->
			<th>Dirección Fisica</th>
			<th></th>

		</thead>
		<tbody>
			@foreach($nodes as $node)
				<tr class="shownot colorow">
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

@section('js')
  <script>
	var colors = ['#FF8A80', '#CCFF90', '#82B1FF', '#FFD180', '#FFFF8D'];
	$('.colorow').each(function() {
		$('.colorow').css('color','#004D40');
    $(this).css('background-color', colors[Math.floor(Math.random() * colors.length)]);
	});
  </script>
@endsection
