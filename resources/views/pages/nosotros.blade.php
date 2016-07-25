@extends('app')

@section('titlePage', 'Nosotros')

@section('content')
	<div class="main-banner">
		<div class="container">
			<div class="row">@include('partials.banners-top')</div>
		</div>
	</div>

	<div class="container about-us">
		<h1 class="handlee verde2 text-center">Acerca de nosotros</h1>
		<div class="row">
			<div class="col-sm-6">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero cupiditate reprehenderit aperiam dolore tempore praesentium minus, architecto optio at possimus reiciendis ipsum quidem dolorum deserunt quisquam. Expedita exercitationem, nesciunt minima. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A necessitatibus libero magnam labore dolorum commodi porro eius placeat, aut consequuntur, veniam inventore quos consequatur. Eaque voluptatem vitae quas autem quod.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero cupiditate reprehenderit aperiam dolore tempore praesentium minus, architecto optio at possimus reiciendis ipsum quidem dolorum deserunt quisquam. Expedita exercitationem, nesciunt minima. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A necessitatibus libero magnam labore dolorum commodi porro eius placeat, aut consequuntur, veniam inventore quos consequatur. Eaque voluptatem vitae quas autem quod.
				</p>
			</div>
			<div class="col-sm-6">
				<iframe width="640" height="360" src="https://www.youtube.com/embed/2y2_7k6MvEc?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		
		<div class="row about-us-images">
			<div class="col-sm-3 hidden"><img src="images/acercade-photo.jpg" alt="acercade-photo"></div>
			<div class="col-sm-3 hidden"><img src="images/acercade-photo.jpg" alt="acercade-photo"></div>
			<div class="col-sm-3 hidden"><img src="images/acercade-photo.jpg" alt="acercade-photo"></div>
			<div class="col-sm-3 hidden"><img src="images/acercade-photo.jpg" alt="acercade-photo"></div>
		</div>

	</div>	
@stop