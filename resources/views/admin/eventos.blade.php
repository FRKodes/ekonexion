@extends('admin')

@section('titlePage', 'Eventos - CMS Ekonexión')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todos los Eventos</h1>

		<div class="row">
			<div class="col-xs-6 col-md-3 col-md-offset-1">
				<a href="{{ url('/admin/eventos/create')}}" class="btn btn-primary login">Agregar Evento</a>
			</div>
		</div>

		<div class="row"><br></div>

		@if(count($eventos)>0)

			<div class="list-group col-md-10 col-md-offset-1">
				<div class="list-group-item container-fluid">
					<div class="col-xs-9 col-sm-5 nombre verde2"><b>Título</b></div>
					<div class="col-sm-5 hidden-xs date verde2"><b>Fecha</b></div>
				</div>
				@foreach($eventos as $evento)
					<div class="list-group-item container-fluid">
						<div class="col-xs-9 col-sm-5 nombre"><a class="verde2" href="/admin/eventos/{{ $evento->id }}/edit" title="Ver el detalle de {{ $evento->title }}">{{ $evento->title }}</a></div>
						<div class="col-sm-5 hidden-xs date"><a class="verde2" href="/admin/eventos/{{ $evento->id }}/edit" title="Ver el detalle de {{ $evento->date }}">{{ $evento->date }}</a></div>
						<div class="col-xs-1"><a href="/admin/eventos/{{ $evento->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
						<div class="col-xs-1"><a href="/admin/eventos/{{ $evento->id }}" class="rojo glyphicon glyphicon-remove" data-method="delete" data-token="{{csrf_token()}}" data-confirm="¿Estás seguro de querer eliminarlo?"></a></div>
					</div>
				@endforeach
			</div>

		@else
			
			<h2 class="handlee text-center">Por el momento no hay eventos que mostrar</h2>

		@endif

		<div class="pagination-container text-center">{!! $eventos->render() !!}</div>

	</div>	
@stop