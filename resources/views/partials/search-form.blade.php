<div class="container-fluid search">
	<div class="container form col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
		<p class="search-title verde2 handlee">Buscar:</p>
		{!! Form::open(['url'=>'search', 'method'=>'GET']) !!}
			<div class="form-group">
				{!! Form::select('giro', [], null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::select('ciudad', [], null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">{!! Form::input('text', 'q', null, ['class'=>'form-control', 'placeholder'=>'Palabras de búsqueda']) !!}</div>
			<div class="form-group">{!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}</div>
		{!! Form::close() !!}		
	</div>
</div>