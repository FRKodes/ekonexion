@extends('admin')

@section('titlePage', 'Editar Evento')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
				
				@if(Session::has('added_successfuly'))
					<div class="alert alert-success text-center">{!! Session::get('added_successfuly') !!}</div>
				@endif
				
				@if(Session::has('images_failed'))
					<div class="alert alert-danger text-center">{!! Session::get('images_failed') !!}</div>
				@endif

				<h1 class="handlee verde2 text-center">Editar evento</h1>

				@if ($errors->any())
					<div class="alert alert-danger">
						<p class="text-center">Hubo un problema al editar el evento.<br><br></p>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				{!! Form::open(['class'=>'form-horizontal', 'role'=>'form', 'url'=>'admin/eventos/'.$evento->id, 'id'=>'EventosForm', 'files'=>true, 'method'=>'PATCH']) !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="col-sm-2">Título</div>
						<div class="col-sm-10"><input type="text" class="form-control" name="title" placeholder="*Título" value="{{ $evento->title }}" data-validate="required"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">Descripción</div>
						<div class="col-sm-10"><input type="text" class="form-control" name="descripction" placeholder="descripción" value="{{ $evento->descripction }}"></div> </div>
					<div class="form-group">
						<div class="col-sm-2">Link</div>
						<div class="col-sm-10"><input type="text" class="form-control" name="link" placeholder="http://" value="{{ $evento->link }}" ></div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">Fecha</div>
						<div class="col-sm-10"><input type="text" class="form-control" name="date" placeholder="Fecha" value="{{ $evento->date }}" ></div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">Status</div>
						<div class="col-sm-10">{!! Form::select('status', [null,0=>'Inactivo', 1=>'Activo'], $evento->status, ['class'=>'form-control']) !!}</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">Imagen</div>
						<div class="col-sm-10">{!! HTML::image('images/eventos/'.$evento->image, $evento->title, ['class'=>'cien'], null) !!}</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">{!! Form::label('image', 'Cambiar imagen', []) !!} </div>
						<div class="col-sm-10">{!! Form::file('image', ['class'=>'form-control', 'id'=>'image']) !!} </div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-9"><button type="submit" class="btn btn-primary login">ACTUALIZAR</button> </div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop