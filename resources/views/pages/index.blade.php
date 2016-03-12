@extends('app')

@section('titlePage', 'Inicio')

@section('content')
	<div class="container main-banner">
		<div class="row">
			<div class="item text-center">
				<p class="title handlee">Lorem ipsum</p>
				<p class="description">Dolore quod suscipit minima, error id fugiat. Dicta reiciendis facilis rem officiis suscipit</p>
			</div>
		</div>
	</div>

	<div class="container last-uploaded bottom">
		
		<h1 class="handlee verde2 text-center">Últimos añadidos</h1>

		<div class="row">

			@foreach ($negocios->slice(0,4) as $negocio)
				<div class="col-sm-3 last-uploaded-item">
					<div class="item-container">
						<figure class="photo"><a href="negocio/{{ $negocio->id }}">
							{!! HTML::image('images/negocios/'.$negocio->logo(), $negocio->nombre_negocio, [], null) !!}</a>
						</figure>
						<div class="info">
							<div class="title"><a class="verde" href="negocio/{{ $negocio->id }}">{{ $negocio->nombre_negocio }}</a></div>
							<div class="description">{{ $negocio->descripcion }}</div>
						</div>
					</div>
				</div>
			@endforeach
			
		</div>
	</div>

	@include('partials.search-form')
	
@stop