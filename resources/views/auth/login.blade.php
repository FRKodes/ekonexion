@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

				<p class="text-center">{!! HTML::image('images/logo-ekonexion.svg', 'logo ekonexion', array('width'=>'200', 'class'=>'inner-logo')) !!}</p>
				<p class="text-center login">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, libero, qui.</p>

				<h1 class="handlee verde2">Inicia sesión</h1>

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>

					<div class="form-group text-right"><a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidaste tu contraseña?</a></div>

					<div class="form-group hidden">
						<div class="col-md-6 col-md-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember"> Remember Me
								</label>
							</div>
						</div>
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
						<button type="submit" class="btn btn-primary login">INICIAR SESIÓN</button>
					</div>
				</form>
				

			</div>
			

		</div>
		
		<div class="row register">
			<p class="text-center register">¿Aún no estás registrado? <a class="azul" href="{{ url('/auth/register') }}">Hazlo aquí</a></p>
		</div>

	</div>
@endsection
