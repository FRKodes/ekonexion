@extends('app')

@section('titlePage', 'Inicio')

@section('content')
	<div class="main-banner">
		<div class="item text-center">
			<p class="title handlee">Lorem ipsum</p>
			<p class="description">Dolore quod suscipit minima, error id fugiat. Dicta reiciendis facilis rem officiis suscipit</p>
		</div>
	</div>

	<div class="container last-uploaded">
		
		<h1 class="handlee verde2 text-center">Últimos añadidos</h1>

		<div class="col-sm-3 last-uploaded-item">
			<div class="item-container">
				<figure class="photo"><img src="images/item-01.jpg" alt=""></figure>
				<div class="info">
					<div class="title verde">Nombre del negocio</div>
					<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 last-uploaded-item">
			<div class="item-container">
				<figure class="photo"><img src="images/item-02.jpg" alt=""></figure>
				<div class="info">
					<div class="title verde">Nombre del negocio</div>
					<div class="description">Aut commodi magni deserunt. Natus quaerat sunt quidem rem sed odit sapiente.</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 last-uploaded-item">
			<div class="item-container">
				<figure class="photo"><img src="images/item-03.jpg" alt=""></figure>
				<div class="info">
					<div class="title verde">Nombre del negocio</div>
					<div class="description">Animi unde dolore aliquam minima cumque id quaerat porro saepe soluta.</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 last-uploaded-item">
			<div class="item-container">
				<figure class="photo"><img src="images/item-04.jpg" alt=""></figure>
				<div class="info">
					<div class="title verde">Nombre del negocio</div>
					<div class="description">Aperiam animi voluptas, eaque reprehenderit.</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid search">
		<div class="container form col-sm-8 col-sm-offset-2">
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