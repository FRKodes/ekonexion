@extends('admin')

@section('titlePage', 'Editar usuario')

@section('content')
	
	<div class="container">

		<h1 class="handlee verde2 text-center">Editar Usuario</h1>

		{!! Form::open(['method'=>'PATCH', 'url'=>'admin/users/'.$user->id]) !!}
		
			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('name', 'Nombre')  !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'name', $user->name, ['class'=>'form-control'])  !!}</div>
			</div>

			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('email', 'Email')  !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'email', $user->email, ['class'=>'form-control', 'readonly'])  !!}</div>
			</div>
			
			{{-- {{  dd( $user->roles ) }} --}}

			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('role', 'Rol de usuario')  !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'role', $user->roles->first()->name, ['class'=>'form-control', 'readonly'])  !!}</div>
			</div>

			<div class="form-group col-sm-8 col-sm-offset-2">
				{!! Form::submit('Guardar', ['class'=>'btn btn-primary submit pull-right']) !!}
			</div>
		
		{!! Form::close() !!}

	</div>

@stop