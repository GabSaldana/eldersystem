@extends('template.maintemp')
@section('Inicio','Inicio')
@section('Datos personales','Datos personales')
@section('Lista', 'Lista de pacientes')
@section('Sub menu 1', 'Notificaciones')
@section('Sub menu 2', 'Nodos')

@section('content')

	<table class="table">
		<thead>
			<th>Paciente</th>
			<th>Variable</th>
		</thead>
		<tbody>
			@foreach($user->variables as $variables)
			<tr>
				<td>{{ $variable->pivot->user_id }}</td>
				<td>{{ $variable->pivot->variable_id }}</td>
				<td>
					<a href="#"
					onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
