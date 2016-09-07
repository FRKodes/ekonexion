@extends('admin')

@section('titlePage', 'CMS El Sendero del chamán - Categorías de los negocios')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todas las categorías de negocios</h1>

		<div class="row">
			<div class="col-xs-6 col-md-3 col-md-offset-1">
				<a href="{{ url('/admin/categories/create')}}" class="btn btn-primary login">Agregar Categoría</a>
			</div>
		</div>

		<div class="row"><br></div>

		@if(count($categories)>0)

			<div class="list-group col-md-10 col-md-offset-1">
				<div class="list-group-item container-fluid">
					<div class="col-xs-6 verde2 nombre"><b>Nombre categoría</b></div>
					<div class="col-xs-4 verde2 hidden padre"><b>Categoría padre</b></div>
					<div class="col-xs-1 verde2 edit"></div>
					<div class="col-xs-1 verde2 delete"></div>
				</div>
				@foreach($categories as $category)
					<div class="list-group-item container-fluid">
						<div class="col-xs-9 nombre"><a class="verde2" href="/admin/categories/{{ $category->id }}/edit" title="Ver el detalle de {{ $category->name }}">{{ $category->name }}</a></div>
						<div class="col-xs-4 hidden padre"><a class="verde2" href="/admin/categories/{{ $category->id }}/edit" title="Ver el detalle de {{ $category->parent }}">{{ ($category->parent == 0)? 'Ninguna': $category->getName() }}</a></div>
						<div class="col-xs-1 text-center edit"><a href="/admin/categories/{{ $category->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
						<div class="col-xs-1 text-center delete"><a href="/admin/categories/{{ $category->id }}" class="rojo glyphicon glyphicon-remove" data-method="delete" data-token="{{csrf_token()}}" data-confirm="¿Estás seguro de querer eliminarlo?"></a></div>
					</div>
				@endforeach
			</div>

		@else
			
			<h2 class="handlee text-center">Por el momento no hay categorías que mostrar.</h2>

		@endif


		<div class="pagination-container text-center">
			{!! $categories->render() !!}
		</div>
	</div>	
@stop