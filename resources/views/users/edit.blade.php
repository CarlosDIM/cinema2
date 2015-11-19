@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($user,['route'=>['users.update',$user],'method'=>'PUT'])!!}
			@include('users.forms.usr')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		<br>

	@endsection