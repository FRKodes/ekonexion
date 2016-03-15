@extends('app')

@section('titlePage', 'Resultados de búsqueda para ')

@section('content')
	
	@include('partials.search-form-and-banner')

	<div class="container">

		@if($negocios->count())
			<div class="row">
				@foreach($negocios as $negocio)
					<div class="col-sm-3 search-result-item">
						<div class="item-container">
							<figure class="photo">
								<a href="negocio/{{ $negocio->id }}">
									{!! HTML::image('images/negocios/'.$negocio->logo(), $negocio->nombre_negocio, [], null) !!}
								</a>
							</figure>
							<div class="info">
								<div class="title"><a class="verde" href="negocio/{{ $negocio->id }}">{{ $negocio->nombre_negocio }}</a></div>
								<div class="description">{{ $negocio->descripcion }}</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="pagination-container text-center">{!! $negocios->render() !!}</div>

		@else
			<div class="row">
				<p>Sorry banda</p>
			</div>
		@endif
	
	</div>

@stop