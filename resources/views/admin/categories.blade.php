@extends('admin')

@section('titlePage', 'CMS Ekonexión - Categorías de los negocios')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todas las categorías de negocios</h1>

		<div class="list-group col-md-10 col-md-offset-1">
			<div class="list-group-item container-fluid">
				<div class="col-xs-6 verde2 nombre"><b>Nombre categoría</b></div>
				<div class="col-xs-4 verde2 padre"><b>Categoría padre</b></div>
				<div class="col-xs-1 verde2 hidden-xs edit"><b>Editar</b></div>
				<div class="col-xs-1 verde2 hidden-xs delete"><b>Borrar</b></div>
			</div>
			@foreach($categories as $category)
				<div class="list-group-item container-fluid">
					<div class="col-xs-6 nombre"><a class="verde2" href="/admin/categories/{{ $category->id }}/edit" title="Ver el detalle de {{ $category->name }}">{{ $category->name }}</a></div>
					<div class="col-xs-4 padre"><a class="verde2" href="/admin/categories/{{ $category->id }}/edit" title="Ver el detalle de {{ $category->parent }}">{{ ($category->parent == 0)? 'Ninguna': $category->getName() }}</a></div>
					<div class="col-xs-1 hidden-xs text-center edit"><a href="/admin/categories/{{ $category->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
					<div class="col-xs-1 hidden-xs text-center delete"><a href="/admin/categories/{{ $category->id }}/destroy" class="black glyphicon glyphicon-remove"></a></div>
				</div>
			@endforeach
		</div>

		<div class="pagination-container text-center">
			{!! $categories->render() !!}
		</div>
	</div>	
@stop