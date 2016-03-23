@extends('admin')

@section('titlePage', 'Editar Banner')

@section('content')
	
	<div class="container">

		<h1 class="handlee verde2 text-center">Editar Banner</h1>

		{!! Form::open(['method'=>'PATCH', 'url'=>'admin/banners/'.$banner->id, 'files'=>true]) !!}
		
			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('title', 'Título')  !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'title', $banner->title, ['class'=>'form-control'])  !!}</div>
			</div>
			
			
			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('description', 'Descripción')  !!}</div>
				<div class="col-sm-10">{!! Form::textarea('description', $banner->description, ['class'=>'form-control']) !!}</div>
			</div>
			
			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('link', 'Link')  !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'link', $banner->link, ['class'=>'form-control'])  !!}</div>
			</div>

			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('lugar', 'Lugar')  !!}</div>
				<div class="col-sm-10">
					{!! Form::select('place', ['home'=>'home', 'inner'=>'inner', 'footer'=>'footer'], $banner->place, ['class'=>'form-control'])  !!}
				</div>
			</div>

			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('imagen', 'Imagen')  !!}</div>
				<div class="col-sm-10">{!! HTML::image('images/banners/'.$banner->imagen, $banner->title, ['class'=>'cien'], null) !!}</div>
			</div>

			<div class="form-group m-bottom-20 col-sm-8 col-sm-offset-2">
				<div class="col-sm-2">{!! Form::label('Cambiar imagen', 'Cambiar imagen')  !!}</div>
				<div class="col-sm-10">{!! Form::file('imagen', ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-8 col-sm-offset-2">
				{!! Form::submit('Guardar', ['class'=>'btn btn-primary submit pull-right']) !!}
			</div>
		
		{!! Form::close() !!}

	</div>

@stop