@extends('app')

@section('titlePage', 'Item Detalle')

@section('content')
	<div class="container detail">
			
		<div class="col-sm-6 white">
			<figure>{!! HTML::image('images/negocios/'.$negocio->logo(), 'logo ekonexion', array('class'=>'')) !!}</figure>
		</div>
		<div class="col-sm-6 white description">
			<h1 class="handlee verde2">{{ $negocio->nombre_negocio }}</h1>
			<div class="description">{{ $negocio->descripcion }}</div>
		</div>

		<div class="row"></div>
		
		@if(count($negocio->images)>0)
			
			@foreach($negocio->images as $image)
				<div class="col-xs-6 col-md-4 col-lg-3 white gallery-item">
					<figure><a href="{{ url('images/negocios/'.$image->image) }}" rel="group" class="fancybox">{!! HTML::image('images/negocios/'.$image->image, 'Imagen '.$negocio->nombre_negocio, []) !!}</figure></a>
				</div>
			@endforeach

		@else
			<div class="row">
				<div class="col-xs-12"><h2 class="handlee verde text-center not-images">Este negocio no tiene más imágenes para mostrar. </h2></div>
			</div>

		@endif

		@if (! Auth::check())
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><a class="verde3 handlee" href="{{ url('auth/login') }}?redirect={{ Request::url() }}">Haz login para ver toda la información!</a></h3>
					<br><br><br>
				</div>
			</div>
		@endif
		
		@if (Auth::check())
			<div class="info-container">
				<div class="col-xs-3 verde handlee">Responsable:</div>
				<div class="col-xs-9">{{ $negocio->nombre_responsable }}</div>
				<div class="col-xs-3 verde handlee">Dirección:</div>
				<div class="col-xs-9">{{ $negocio->direccion }}</div>
				<div class="col-xs-3 verde handlee">Tel:</div>
				<div class="col-xs-9">{{ $negocio->telefono }}</div>
				
				{{-- <div class="col-xs-3 verde handlee">Cel:</div>
				<div class="col-xs-9">{{ $negocio->celular }}</div> --}}

				<div class="col-xs-3 verde handlee">Correo:</div>
				<div class="col-xs-9">
					@if($negocio->correo)
						<a class="azul" href="mailto:{{ $negocio->correo }}" title="enviar un correo a {{ $negocio->correo }}">{{ $negocio->correo }}</a>
					@else
						&nbsp;
					@endif
				</div>
				
				<div class="col-xs-3 verde handlee">Web:</div>
				<div class="col-xs-9">
					@if($negocio->sitio_web)
						<a class="azul" href="http://{{ $negocio->sitio_web }}" target="_blank" title="Visitar el sitio web">{{ $negocio->sitio_web }}</a>
					@else
						&nbsp;
					@endif
				</div>
				
				<div class="col-xs-12 map-container"><figure>{!! HTML::image('images/mapa.jpg', 'map image', array('class'=>'map')) !!}</figure></div>
			</div>
		@endif

	</div>

	@include('partials.related')

@stop