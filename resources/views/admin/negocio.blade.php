@extends('app')

@section('titlePage', 'Editar Negocio')

@section('content')
	<div class="container">
		
		<h1 class="handlee verde2 text-center">Editar Negocio</h1>

		@if(Session::has('updated_successfuly'))
			<div class="alert alert-success col-sm-10 col-sm-offset-1">{{ Session::get('updated_successfuly') }} </div>
		@endif

		{!! Form::open(['method'=>'PATCH', 'id'=>'editNegocio', 'files'=>true, 'url'=>'admin/negocios/'.$negocio->id]) !!}
			
			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('Nombre_negocio', 'Nombre del negocio') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'nombre_negocio', $negocio->nombre_negocio, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('Descripcion', 'Descripción') !!}</div>
				<div class="col-sm-10">{!! Form::textarea('descripcion', $negocio->descripcion, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('categoria', 'Categoría') !!}</div>
				<div class="col-sm-10">
					{!! Form::select('categoria', [], $negocio->categoria, ['class'=>'form-control'])!!}
				</div>
			</div>
			
			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('Email', 'Email') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'correo', $negocio->correo, ['class'=>'form-control']) !!}</div>
			</div>
			
			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('telefono', 'Telefono') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'telefono', $negocio->telefono, ['class'=>'form-control']) !!}</div>
			</div>
			
			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('dirección', 'Dirección') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'direccion', $negocio->direccion, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('ciudad', 'Ciudad') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'ciudad', $negocio->ciudad, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('estado', 'Estado') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'estado', $negocio->estado, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('sitio_web', 'Sitio web') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'sitio_web', $negocio->sitio_web, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('coords', 'Coords') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'coords', $negocio->coords, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('fb', 'Facebook') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'fb', $negocio->fb, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('tw', 'Twitter') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'tw', $negocio->tw, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('ig', 'Instagram') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'ig', $negocio->ig, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('status', 'Status') !!}</div>
				<div class="col-sm-10">{!! Form::select('status', ['0'=>'Inactivo', '1'=>'Activo'], $negocio->status, ['class'=>'form-control']) !!}</div>
			</div>
			
			<h2 class=" col-sm-12 handlee verde2 text-center">Datos del responsable</h2>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('nombre_responsable', 'Nombre Responsable') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'nombre_responsable', $negocio->nombre_responsable, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('correo_responsable', 'Email Responsable') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'correo_responsable', $negocio->correo_responsable, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('telefono_responsable', 'Telefono Responsable') !!}</div>
				<div class="col-sm-10">{!! Form::input('text', 'telefono_responsable', $negocio->telefono_responsable, ['class'=>'form-control']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('logo', 'Logo') !!}</div>
				<div class="col-sm-10"><figure>{!! HTML::image('images/negocios/'.$negocio->logo(), 'Logo '.$negocio->nombre_negocio, ['width'=>'150']) !!}</figure></div>
			</div>
			
			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('¿Cambiar logo?', '¿Cambiar logo?') !!}</div>
				<div class="col-sm-10">{!! Form::file('image', ['class'=>'form-control', 'id'=>'image']) !!}</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-sm-2">{!! Form::label('imagenes', 'Imágenes') !!}</div>
				<div class="col-sm-10">
					@foreach($negocio->images as $image)
						{!! HTML::image('images/negocios/'.$image->image, 'Imagen '.$negocio->nombre_negocio, ['width'=>'150']) !!}
					@endforeach
				</div>
			</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
					<div class="col-sm-2">{!! Form::label('Agregar más imágenes', 'Agregar más imágenes') !!}</div>
					<div class="col-sm-10">{!! Form::file('images[]', ['class'=>'form-control', 'id'=>'images', 'multiple'=>true]) !!}</div>
				</div>

			<div class="form-group col-sm-10 col-sm-offset-1">
				<div class="col-xs-12 text-right">
					Registered {!! Carbon::createFromFormat('Y-m-d H:i:s', $negocio->created_at)->diffForHumans(); !!}
				</div>
			</div>



			<div class="form-group col-sm-10 col-sm-offset-1">
				<a clas="btn btn-danger submit" href="#">Borrar</a>
				{!! Form::submit('Guardar', ['class'=>'btn btn-primary submit pull-right']) !!}
			</div>

		{!! Form::close() !!}

	</div>
	
@stop