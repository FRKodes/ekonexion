@extends('admin')

@section('titlePage', 'CMS Ekonexión')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todos los negocios registrados</h1>

		<div class="list-group col-md-10 col-md-offset-1">
			@foreach($negocios as $negocio)
				<div class="list-group-item container-fluid">
					<div class="col-xs-10 nombre"><a class="{{ ($negocio->status)? 'verde2' : 'rojo' }}" href="/admin/negocios/{{ $negocio->id }}/edit" title="Ver el detalle de {{ $negocio->nombre_negocio }}">{{ $negocio->nombre_negocio }}</a></div>
					<div class="col-xs-1 hidden-xs edit"><a href="/admin/negocios/{{ $negocio->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
					<div class="col-xs-1 hidden-xs delete"><a href="/admin/negocios/{{ $negocio->id }}/destroy" class="black glyphicon glyphicon-remove"></a></div>
				</div>
			@endforeach
		</div>

		<div class="pagination-container text-center">
			{!! $negocios->render() !!}
		</div>
	</div>	
@stop