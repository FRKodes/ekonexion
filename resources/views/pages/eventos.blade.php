@extends('admin')

@section('titlePage', 'Eventos')

@section('content')
	<div class="container">

			<h1 class="handlee verde2 text-center">Eventos</h1>
			
			<div class="row">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt voluptatem esse fugiat laborum debitis pariatur praesentium officia, officiis neque accusamus veritatis, nemo in maxime porro dolore provident tenetur earum totam!</p>
			</div>

			@if(count($eventos) > 0)
				<div class="row">
					@foreach ($eventos as $evento)	
						<div class="event-item" style="background-image:url(/images/eventos/{{ $evento->image }})">
							<a href="{{ $evento->link }}" class="blanco" title="{{ $evento->title }}" target="_blank">
								<h2 class="title handlee text-center">{{ $evento->title }}</h2>
								<p class="text-center">{{ $evento->descripction }}</p>
							</a>
						</div>
					@endforeach
				</div>
			@else
			
			@endif

		</div>
@stop