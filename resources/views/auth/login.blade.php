@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<p class="text-center">{!! HTML::image('images/logo-ekonexion.svg', 'logo ekonexion', array('width'=>'200', 'class'=>'inner-logo')) !!}</p>
			<p class="text-center login">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, libero, qui.</p>

			<h1 class="handlee verde2">Inicia sesión:</h1>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6">
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
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
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary login">Iniciar sesión</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>
@endsection
