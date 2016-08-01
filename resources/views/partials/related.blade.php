<div class="container last-uploaded bottom">	
	@if(count($related_ones)>0)
		<h2 class="handlee verde2 text-center">También te puede interesar</h2>
		
		<div class="row">
			@foreach ($related_ones as $related)
				<div class="col-sm-3 last-uploaded-item">
					<div class="item-container">
						<figure class="photo"><a href="negocio/{{ $negocio->id }}">{!! HTML::image($related->logo(), $related->nombre_negocio, array('class'=>'')) !!}</a></figure>
						<div class="info">
							<div class="title"><a class="verde" href="negocio/{{ $negocio->id }}">{{ $related->nombre_negocio}}</a></div>
							<div class="description"> {{ $related->descripcion}} </div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@endif
</div>