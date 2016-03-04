@extends('app')

@section('titlePage', 'Editar categoría')

@section('content')
	
	<div class="container">

		<h1 class="handlee verde2 text-center">Editar Categoría</h1>

		{!! Form::open(['method'=>'PATCH', 'url'=>'admin/categories/'.$category->id]) !!}
		
			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-3">{!! Form::label('name', 'Nombre categoría')  !!}</div>
				<div class="col-sm-9">{!! Form::input('text', 'name', $category->name, ['class'=>'form-control'])  !!}</div>
			</div>

			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-3">{!! Form::label('parent', 'Categoría padre')  !!}</div>
				<div class="col-sm-9">
					
					{!! Form::select('parent', $categories, $category->parent, ['class'=>'form-control']) !!}

				</div>
			</div>

			<div class="form-group col-sm-8 col-sm-offset-2">
				{!! Form::submit('Guardar', ['class'=>'btn btn-primary submit pull-right']) !!}
			</div>
		
		{!! Form::close() !!}

	</div>

@stop