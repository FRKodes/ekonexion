@extends('app')

@section('titlePage', 'Item Detalle')

@section('content')
	<div class="container detail">
			
		<div class="col-sm-6 white">
			<figure>{!! HTML::image($negocio->logo(), 'logo ekonexion', array('class'=>'')) !!}</figure>
		</div>
		<div class="col-sm-6 white description">
			<h1 class="handlee verde2">{{ $negocio->nombre_negocio }}</h1>
			<div class="description">{!! nl2br($negocio->descripcion) !!}</div>
		</div>

		<div class="row"></div>
		
		@if(count($negocio->images)>0)
			
			@foreach($negocio->images as $image)
				<div class="col-xs-6 col-md-4 col-lg-3 white gallery-item">
					<figure><a href="{{ url($image->image) }}" rel="group" class="fancybox">{!! HTML::image($image->image, 'Imagen '.$negocio->nombre_negocio, []) !!}</figure></a>
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
				
				<div class="col-md-6 ">
					<div class="col-xs-3 verde handlee">Responsable:</div>
					<div class="col-xs-9">{{ ($negocio->nombre_responsable) ? $negocio->nombre_responsable : '--' }}</div>
					<div class="col-xs-3 verde handlee">Dirección:</div>
					<div class="col-xs-9">{{ ($negocio->direccion) ? $negocio->direccion : '--' }}</div>
					<div class="col-xs-3 verde handlee">Ciudad:</div>
					<div class="col-xs-9">{{ ($negocio->ciudad) ? $negocio->ciudad :'--' }}</div>
					<div class="col-xs-3 verde handlee">Estado:</div>
					<div class="col-xs-9">{{ ($negocio->estado) ? $negocio->estado : '--' }}</div>
				</div>

				<div class="col-md-6 ">
					<div class="col-xs-3 verde handlee">Tel:</div>
					<div class="col-xs-9">{{ ($negocio->telefono) ? $negocio->telefono : '--' }}</div>
					<div class="col-xs-3 verde handlee">Correo:</div>
					<div class="col-xs-9">{!! ($negocio->correo) ? '<a class="azul" href="mailto: '.$negocio->correo.'" title="Enviar un correo a '.$negocio->correo.'">'.$negocio->correo.'</a>' : '--' !!}</div>				
					<div class="col-xs-3 verde handlee">Web:</div>
					<div class="col-xs-9">{!! ($negocio->sitio_web) ? '<a class="azul" href="'.$negocio->sitio_web.'" target="_blank" title="Visitar el sitio web">'.$negocio->sitio_web.'</a>' : '--' !!}</div>
					<div class="col-xs-3 verde handlee">Redes Sociales:</div>
					<div class="col-xs-9">
						<ul class="detail-social">
							{!! ($negocio->fb) ? '<li><a target="_blank" title="Ver perfil en Facebook" href="'.$negocio->fb.'" class="icon-fb"></a></li>' : ' ' !!}
							{!! ($negocio->tw) ? '<li><a target="_blank" title="Ver perfil en Twitter" href="'.$negocio->tw.'" class="icon-tw"></a></li>': ' ' !!}	
							{!! ($negocio->ig) ? '<li><a target="_blank" title="Ver perfil en Instagram" href="'.$negocio->ig.'" class="icon-ig"></a></li>' : ' ' !!}
						</ul>
					</div>
				</div>

				@if($negocio->coords)
					<div class="col-xs-12 map-container">
						<figure>
							<a href="http://maps.google.com/maps?q={{ $negocio->coords }}" title="Ver mapa completo" target="_blank">
								{!! HTML::image('http://maps.googleapis.com/maps/api/staticmap?center='.$negocio->coords.'&format=jpeg&maptype=roadmap&markers=color:green%7Clabel:S%7C'.$negocio->coords.'&zoom=16&scale=2&size=1920x250&style=element:labels|visibility:on&style=element:geometry.stroke|visibility:on&key=AIzaSyBU7yM_4AKqEIZhcEBN5Nb-PRVBGeKLG1o', 'map image', array('class'=>'map')) !!}
							</a>
						</figure>
					</div>
				@endif
			</div>
		@endif

	</div>

	@include('partials.related')

@stop