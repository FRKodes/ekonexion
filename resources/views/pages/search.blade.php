@extends('app')

@section('titlePage', 'Resultados de búsqueda para ')

@section('content')
	
	<div class="container">
		@if($negocios->count())
			@foreach($negocios as $negocio)
				<div class="row">
					{{ $negocio->nombre_negocio }}
				</div>
			@endforeach
		@else
			<div class="row">
				<p>Sorry banda</p>
			</div>
		@endif
	</div>

@stop