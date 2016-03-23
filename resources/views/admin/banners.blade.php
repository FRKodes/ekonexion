@extends('admin')

@section('titlePage', 'Banners')

@section('content')
	<div class="container">
		
		<h1 class="handlee text-center verde2">Banners</h1>

		@if(count($banners) > 0)
			
			<div class="list-group col-md-10 col-md-offset-1">
				
				@foreach($banners as $banner)
					<div class="list-group-item container-fluid">
						<div class="col-xs-5"><a href="/admin/banners/{{ $banner->id }}/edit" class="verde2">{{ $banner->title }}</a></div>
						<div class="col-xs-5">{{ $banner->place }}</div>
						<div class="col-xs-1 hidden-xs"><a href="/admin/banners/{{ $banner->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
						<div class="col-xs-1 hidden-xs"><a href="/admin/banners/{{ $banner->id }}/edit" class="black glyphicon glyphicon-remove"></a></div>
					</div>
				@endforeach

			</div>
		@else
		
			<h2 class="text-center">No hay banners por el momento.</h2>

		@endif
		
	</div>
	
@stop