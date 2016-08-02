<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('titlePage', 'Inicio') - Ekonexión</title>
	<link href="{{ elixir('css/all.min.css') }}" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	@include('partials.facebook')
	
	@include('partials.nav')

	@yield('content')

	@include('partials.footer-admin')

	<script src="{{ elixir('js/all.min.js') }}"></script>
</body>
</html>
