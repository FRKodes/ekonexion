@extends('app')

@section('titlePage', 'Inscribe tu negocio')

@section('content')
	<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

					<p class="text-center">{!! HTML::image('images/logo-ekonexion.svg', 'logo ekonexion', array('width'=>'200', 'class'=>'inner-logo')) !!}</p>
					<p class="text-center login">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, libero, qui.</p>

					<h1 class="handlee verde2">Registra tu negocio</h1>

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group"><input type="text" class="form-control" name="nombre" placeholder="*Nombre" value="{{ old('nombre') }}"></div>
						<div class="form-group"><input type="email" class="form-control" name="email" placeholder="*Correo" value="{{ old('email') }}"></div>
						<div class="form-group"><input type="text" class="form-control" name="nombre_negocio" placeholder="*Nombre de tu negocio" value=""></div>
						<div class="form-group"><input type="text" class="form-control" name="giro" placeholder="*Selecciona un giro" value=""></div>
						<div class="form-group"><textarea class="form-control" name="descripcion" placeholder="*Escribe una descripción de tu negocio" id="descripcion" cols="30" rows="10"></textarea></div>
						<div class="form-group dashed"></div>
						
						<div class="form-group hidden">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>

						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Lo sentimos!</strong> Hubo un problema al iniciar sesión.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<div class="form-group">
							<button type="submit" class="btn btn-primary login">SIGUIENTE</button>
						</div>
					</form>
				</div>
			</div>

		</div>
@stop