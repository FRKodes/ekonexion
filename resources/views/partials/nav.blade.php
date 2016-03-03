<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="/images/logo-ekonexion.svg" alt="logo ekonexion"></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{ url('/') }}">Inicio</a></li>
				<li><a href="{{ url('nosotros') }}">Nosotros</a></li>
				<li><a href="{{ url('negocios/create') }}">Inscribe tu negocio</a></li>
				<li><a href="{{ url('aviso-de-privacidad') }}">Aviso de Privacidad</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('/admin/dashboard') }}">Negocios</a></li>
				<li><a href="{{ url('/admin/users') }}">Usuarios</a></li>
				@if (Auth::guest())
					<li><a href="{{ url('/auth/login') }}">Inicia sesión</a></li>
					<li><a href="{{ url('/auth/register') }}">Regístrate</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/auth/logout') }}">Cerrar sesión</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>