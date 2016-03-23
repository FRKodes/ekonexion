@extends('admin')

@section('titlePage', 'Inscribe tu negocio')

@section('content')
	<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

					<p class="text-center">{!! HTML::image('images/logo-ekonexion.svg', 'logo ekonexion', array('width'=>'200', 'class'=>'inner-logo')) !!}</p>
					<p class="text-center login">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, libero, qui.</p>
					
					@if(Session::has('added_successfuly'))
						<div class="alert alert-success text-center">{!! Session::get('added_successfuly') !!}</div>
					@endif
					
					@if(Session::has('images_failed'))
						<div class="alert alert-danger text-center">{!! Session::get('images_failed') !!}</div>
					@endif

					<h1 class="handlee verde2">Registra tu negocio</h1>

					@if ($errors->any())
						<div class="alert alert-danger">
							<p class="text-center"><strong >Lo sentimos!</strong> Hubo un problema al registrar el negocio.<br><br></p>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('negocios') }}" id="registerForm"> --}}

					{!! Form::open(['class'=>'form-horizontal', 'role'=>'form', 'url'=>'negocios', 'id'=>'registerForm', 'files'=>true]) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group"><input type="text" class="form-control" name="nombre_negocio" placeholder="*Nombre del negocio" value="" data-validate="required"></div>
						<div class="form-group"><input type="email" class="form-control" name="email" placeholder="*Email" value="{{ old('email') }}" data-validate="required|email"></div>
						<div class="form-group"><textarea class="form-control" name="descripcion" placeholder="Escribe una descripción de tu negocio" id="descripcion" cols="30" rows="10"></textarea></div>
						<div class="form-group"><input type="text" class="form-control" name="giro" placeholder="Selecciona un giro" value=""></div>
						<div class="form-group"><input type="text" class="form-control" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}"></div>
						<div class="form-group"><input type="text" class="form-control" name="ciudad" placeholder="*Ciudad" value="{{ old('ciudad') }}"></div>
						<div class="form-group"><input type="text" class="form-control" name="estado" placeholder="Estado" value="{{ old('estado') }}"></div>
						<div class="form-group"><input type="text" class="form-control" name="telefono" placeholder="*Teléfono" value="{{ old('telefono') }}" data-validate="required"></div>
						<div class="form-group"><input type="text" class="form-control" name="sitio_web" placeholder="Sitio web" value="{{ old('sitio_web') }}"></div>
						<div class="form-group"><input type="text" class="form-control" name="coords" placeholder="Coordenadas google Maps" value="{{ old('coords') }}"></div>
						<div class="form-group">
							<span class="icon-fb"></span>
							<input type="text" class="form-control ninety" name="fb" placeholder="Escribe tu nombre de usuario en Facebook" value="{{ old('fb') }}">
						</div>

						<div class="form-group">
							<span class="icon-tw"></span>
							<input type="text" class="form-control ninety" name="tw" placeholder="Escribe tu nombre de usuario en Twitter" value="{{ old('tw') }}">
						</div>

						<div class="form-group">
							<span class="icon-ig"></span>
							<input type="text" class="form-control ninety" name="ig" placeholder="Escribe tu nombre de usuario en Instagram" value="{{ old('ig') }}">
						</div>

						<div class="form-group">
							{{-- <button type="submit" class="btn btn-primary login">SIGUIENTE</button> --}}
							{{-- <a href="#next" class="btn btn-primary login">SIGUIENTE</a> --}}
						</div>
						
						<h2 class="handlee verde2">Datos de contacto</h2>

						<div class="form-group"><input type="text" class="form-control" name="nombre_responsable" placeholder="*Nombre" value="{{ old('nombre_responsable') }}" data-validate="required"></div>
						<div class="form-group"><input type="text" class="form-control" name="correo_responsable" placeholder="*Email del responsable del negocio" value="{{ old('correo_responsable') }}" data-validate="required|email"></div>
						<div class="form-group"><input type="text" class="form-control" name="telefono_responsable" placeholder="*Teléfono del responsable del negocio" value="{{ old('telefono_responsable') }}" data-validate="required"></div>
						<div class="form-group dashed"></div>
						
						<div class="form-group">
							{!! Form::label('image', 'Selecciona el logo', []) !!}
							{!! Form::file('image', ['class'=>'form-control', 'id'=>'image']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('images', 'Selecciona algunas imágenes del negocio', []) !!}
							{!! Form::file('images[]', ['class'=>'form-control', 'id'=>'images', 'multiple'=>true]) !!}
						</div>

						<div class="form-group"><button type="submit" class="btn btn-primary login">REGISTRAR</button></div>
						<div class="sent_mail_alert register text-center">
							¡Gracias por registrarte!<br>En breve nos comunicaremos con el responsable para verificar datos.
						</div>
					{{-- </form> --}}
					{!! Form::close() !!}
				</div>
			</div>

		</div>
@stop