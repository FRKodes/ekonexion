<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.metas')
	@include('partials.styles')
</head>
<body>
	
	@include('partials.facebook')

	@include('partials.nav')

	@yield('content')

	@include('partials.footer')

	<script src="{{ elixir('js/all.min.js') }}"></script>

	@include('partials.google')
	
</body>
</html>
