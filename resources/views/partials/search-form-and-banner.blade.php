<div class="container search inner">
	
	<div class="form col-sm-6">
		<p class="search-title verde2 handlee">Buscar:</p>
		{!! Form::open(['url'=>'search', 'method'=>'GET']) !!}
			<div class="form-group">{!! Form::select('giro', $selectCategorias, Request::get('giro'), ['class'=>'form-control']) !!}</div>
			<div class="form-group">{!! Form::select('ciudad', $ciudades_array, Request::get('ciudad'), ['class'=>'form-control']) !!}</div>
			<div class="form-group">{!! Form::input('text', 'q', Request::get('q'), ['class'=>'form-control', 'placeholder'=>'Palabras de búsqueda']) !!}</div>
			<div class="form-group">{!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}</div>
		{!! Form::close() !!}
	</div>
	
	<div class="col-sm-6 banner hidden-xs">

		{{-- @if($banners_inner)
			<div class="home-slider banner-inner">
				@foreach ($banners_inner as $banner_inner)
					<div class="item text-center" style="background-image: url({{ $banner_inner->imagen }})">
						<a href="{{ $banner_inner->link }}" class="blanco" target="_blank">
							<p class="title handlee">{{ $banner_inner->title }}</p>
							<p class="description">{{ $banner_inner->description }}</p>
						</a>
					</div>
				@endforeach
			</div>
		@endif --}}

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- El sendero - recuadro directorio -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:250px"
		     data-ad-client="ca-pub-7579892442011350"
		     data-ad-slot="6895697226"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

</div>