@extends('app')

@section('titlePage', 'Item Detalle')

@section('content')
	<div class="container detail">
			
		<div class="col-sm-6 white">
			<figure>{!! HTML::image('images/item-01.jpg', 'logo ekonexion', array('class'=>'')) !!}</figure>
		</div>
		<div class="col-sm-6 white description">
			<h1 class="handlee verde2">{{ $negocio->nombre_negocio }}</h1>
			<div class="description">{{ $negocio->descripcion }}</div>
		</div>

		<div class="row"></div>

		<div class="col-sm-6 col-lg-3 white gallery-item"><figure>{!! HTML::image('images/acercade-photo.jpg', 'alt text image', array('class'=>'')) !!}</figure></div>
		<div class="col-sm-6 col-lg-3 white gallery-item"><figure>{!! HTML::image('images/acercade-photo.jpg', 'alt text image', array('class'=>'')) !!}</figure></div>
		<div class="col-sm-6 col-lg-3 white gallery-item"><figure>{!! HTML::image('images/acercade-photo.jpg', 'alt text image', array('class'=>'')) !!}</figure></div>
		<div class="col-sm-6 col-lg-3 white gallery-item"><figure>{!! HTML::image('images/acercade-photo.jpg', 'alt text image', array('class'=>'')) !!}</figure></div>

		
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
				<div class="col-xs-9"><a class="azul" href="mailto:{{ $negocio->correo }}" title="enviar un correo a {{ $negocio->correo }}">{{ $negocio->correo }}</a></div>
				<div class="col-xs-3 verde handlee">Web:</div>
				<div class="col-xs-9"><a class="azul" href="http://{{ $negocio->sitio_web }}" target="_blank" title="Visitar el sitio web">{{ $negocio->sitio_web }}</a></div>
				<div class="col-xs-12 map-container"><figure>{!! HTML::image('images/mapa.jpg', 'map image', array('class'=>'map')) !!}</figure></div>
			</div>
		@endif

	</div>

	<div class="container last-uploaded bottom">
		
		<h2 class="handlee verde2 text-center">También te puede interesar</h2>

		<div class="row">
			<div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="item/1">{!! HTML::image('images/item-01.jpg', 'alt text image', array('class'=>'')) !!}</a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/1">Nombre del negocio</a></div>
						<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="item/2">{!! HTML::image('images/item-01.jpg', 'alt text image', array('class'=>'')) !!}</a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/2">Nombre del negocio</a></div>
						<div class="description">Aut commodi magni deserunt. Natus quaerat sunt quidem rem sed odit sapiente.</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="item/3">{!! HTML::image('images/item-01.jpg', 'alt text image', array('class'=>'')) !!}</a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/3">Nombre del negocio</a></div>
						<div class="description">Animi unde dolore aliquam minima cumque id quaerat porro saepe soluta.</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="item/4">{!! HTML::image('images/item-01.jpg', 'alt text image', array('class'=>'')) !!}</a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/4">Nombre del negocio</a></div>
						<div class="description">Aperiam animi voluptas, eaque reprehenderit.</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop