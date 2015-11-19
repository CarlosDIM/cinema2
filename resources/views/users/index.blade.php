@extends('layouts.admin')
	@include('alerts.success')
	@section('content')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Activo</th>
			<th>Operacion</th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->sw_activo}}</td>
				<td>
					{!!link_to_route('users.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>
			</tbody>
		@endforeach
	</table>

	@endsection