@extends('admin')

@section('titlePage', 'Users - CMS El sendero del chamán')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todos los usuarios registrados</h1>
		
		@if(count($users)>0)

			<div class="list-group col-md-10 col-md-offset-1">

				<div class="list-group-item container-fluid">
					<div class="col-xs-9 col-sm-5 nombre verde2"><b>Nombre</b></div>
					<div class="col-sm-5 hidden-xs email verde2"><b>Email</b></div>
				</div>

				@foreach($users as $user)
					<div class="list-group-item container-fluid">
						<div class="col-xs-9 col-sm-5 nombre"><a class="verde2" href="/admin/users/{{ $user->id }}/edit" title="Ver el detalle de {{ $user->name }}">{{ $user->name }}</a></div>
						<div class="col-sm-5 hidden-xs email"><a class="verde2" href="/admin/users/{{ $user->id }}/edit" title="Ver el detalle de {{ $user->email }}">{{ $user->email }}</a></div>
						<div class="col-xs-1"><a href="/admin/users/{{ $user->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
						<div class="col-xs-1"><a href="/admin/users/{{ $user->id }}" class="rojo glyphicon glyphicon-remove" data-method="delete" data-token="{{csrf_token()}}" data-confirm="¿Estás seguro de querer eliminarlo?"></a></div>
					</div>
				@endforeach
			</div>

		@else
			
			<h2 class="handlee text-center">Por el momento no hay registros que mostrar</h2>

		@endif

		<div class="pagination-container text-center">{!! $users->render() !!}</div>
	</div>	
@stop