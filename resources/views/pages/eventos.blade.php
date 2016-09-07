@extends('admin')

@section('titlePage', 'Eventos')

@section('content')
	<div class="container">
			<h1 class="handlee verde2 text-center">Eventos</h1>
			
			<div class="row">
				<p>
					Promovemos Eventos Espirituales en todo México. Entérate de todas las novedades que existen en tu ciudad. 
					Contáctanos: <a href="mailto:theshamanicjourney@gmail.com" target="_blank" title="Envíanos un email">theshamanicjourney@gmail.com</a>
				</p>
			</div>

			@if(count($eventos) > 0)
				<div class="row">
					@foreach ($eventos as $evento)
						<div class="event-item" style="background-image:url(https://s3.amazonaws.com/el-sendero-del-chaman/eventos/{{ $evento->image }})">
							<a href="{{ $evento->link }}" class="blanco" title="{{ $evento->title }}" target="_blank">
								<h2 class="title handlee text-center">{{ $evento->title }}</h2>
								<p class="text-center">{{ $evento->descripction }}</p>
							</a>
						</div>
					@endforeach
				</div>
			@else
			 {{-- Do nothing --}}
			@endif
	</div>
@stop