@extends('admin')

@section('titlePage', 'Banners')

@section('content')
	<div class="container">
		
		<h1 class="handlee text-center verde2">Banners</h1>

		<div class="row">
			<div class="col-xs-6 col-md-3 col-md-offset-1">
				<a href="{{ url('/admin/banners/create')}}" class="btn btn-primary login">Agregar Banner</a>
			</div>
		</div>

		<div class="row"><br></div>

		@if(count($banners) > 0)
			
			<div class="list-group col-md-10 col-md-offset-1">
				
				@foreach($banners as $banner)
					<div class="list-group-item container-fluid">
						<div class="col-xs-9 col-sm-5"><a href="/admin/banners/{{ $banner->id }}/edit" class="verde2">{{ $banner->title }}</a></div>
						<div class="col-xs-5 hidden-xs">{{ $banner->place }}</div>
						<div class="col-xs-1"><a href="/admin/banners/{{ $banner->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
						<div class="col-xs-1"><a href="/admin/banners/{{ $banner->id }}" class="rojo glyphicon glyphicon-remove" data-method="delete" data-token="{{csrf_token()}}" data-confirm="¿Estás seguro de querer eliminarlo?"></a></div>
					</div>
				@endforeach

			</div>
		@else
		
			<h2 class="text-center">No hay banners por el momento.</h2>

		@endif
		
	</div>
	
@stop