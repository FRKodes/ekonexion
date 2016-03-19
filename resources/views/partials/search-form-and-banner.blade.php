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
		<figure>
			<a href="#" title="OK" target="_blank">
				{!! HTML::image('images/banners/banner-inner.jpg', 'Banner', [], null) !!}
			</a>
		</figure>
	</div>

</div>