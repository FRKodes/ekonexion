@extends('app')

@section('titlePage', 'Users - CMS Ekonexión')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todos los usuarios registrados</h1>

		<div class="list-group col-md-10 col-md-offset-1">
			@foreach($users as $user)
				<div class="list-group-item container-fluid">
					<div class="col-xs-5 nombre"><a class="verde2" href="/admin/users/{{ $user->id }}/edit" title="Ver el detalle de {{ $user->name }}">{{ $user->name }}</a></div>
					<div class="col-xs-5 email"><a class="verde2" href="/admin/users/{{ $user->id }}/edit" title="Ver el detalle de {{ $user->email }}">{{ $user->email }}</a></div>
					<div class="col-xs-1 hidden-xs"><a href="/admin/users/{{ $user->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
					<div class="col-xs-1 hidden-xs"><a href="/admin/users/{{ $user->id }}/edit" class="black glyphicon glyphicon-remove"></a></div>
				</div>
			@endforeach
		</div>
	</div>	
@stop