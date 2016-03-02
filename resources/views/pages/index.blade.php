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
						<figure class="photo"><a href="negocio/{{ $negocio->id }}"><img src="images/item-01.jpg" alt=""></a></figure>
						<div class="info">
							<div class="title"><a class="verde" href="negocio/{{ $negocio->id }}">{{ $negocio->nombre_negocio }}</a></div>
							<div class="description">{{ $negocio->descripcion }}</div>
						</div>
					</div>
				</div>

			@endforeach
			
			{{-- <div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="negocio/2"><img src="images/item-02.jpg" alt=""></a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/2">Nombre del negocio</a></div>
						<div class="description">Aut commodi magni deserunt. Natus quaerat sunt quidem rem sed odit sapiente.</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="negocio/3"><img src="images/item-03.jpg" alt=""></a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/3">Nombre del negocio</a></div>
						<div class="description">Animi unde dolore aliquam minima cumque id quaerat porro saepe soluta.</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 last-uploaded-item">
				<div class="item-container">
					<figure class="photo"><a href="negocio/4"><img src="images/item-04.jpg" alt=""></a></figure>
					<div class="info">
						<div class="title"><a class="verde" href="negocio/4">Nombre del negocio</a></div>
						<div class="description">Aperiam animi voluptas, eaque reprehenderit.</div>
					</div>
				</div>
			</div> --}}
		</div>
	</div>

	<div class="container-fluid search">
		<div class="container form col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
			<p class="search-title verde2 handlee">Buscar:</p>
			{!! Form::open() !!}
				<div class="form-group">{!! Form::input('text', 'giro', null, ['class'=>'form-control']) !!}</div>
				<div class="form-group">{!! Form::input('text', 'ciudad', null, ['class'=>'form-control']) !!}</div>
				<div class="form-group">{!! Form::input('text', 'keywords', null, ['class'=>'form-control']) !!}</div>
				<div class="form-group">{!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}</div>
			{!! Form::close() !!}		
		</div>
	</div>
@stop