@extends('app')

@section('titlePage', 'Regístrate')

@section('content')

@if(Request::input('redirect'))
	{{ Session::set('redirect', Request::input('redirect')) }}
@endif

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

			<p class="text-center">{!! HTML::image('images/el-sendero-del-chaman-logo.png', 'logo ekonexion', array('width'=>'200', 'class'=>'inner-logo')) !!}</p>
			<p class="text-center login hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, libero, qui.</p>
			<h1 class="handlee verde2">Regístrate</h1>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group"><input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}"> </div>
				<div class="form-group"><input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"> </div>
				<div class="form-group"><input type="password" class="form-control" name="password" placeholder="Crea una contraseña"> </div>
				<div class="form-group"><input type="password" class="form-control" placeholder="Confirmar la contraseña" name="password_confirmation"> </div>

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Lo sentimos!</strong> hubo un problema al hacer el registro.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="form-group">
					<button type="submit" class="btn btn-primary login">REGISTRAR</button>
				</div>
			</form>

		</div>
	</div>

	<div class="row register">
		<p class="text-center register">¿Ya tienes una cuenta? <a class="azul" href="{{ (Request::input('redirect'))? url('auth/login?redirect='.Request::input('redirect')) : url('auth/login') }}">Inicia sesión aquí</a></p>
	</div>

</div>
@endsection
