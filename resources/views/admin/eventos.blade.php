@extends('admin')

@section('titlePage', 'Eventos - CMS Ekonexión')

@section('content')
	<div class="container">
		<h1 class="handlee text-center verde2">Todos los Eventos</h1>

		<div class="row">
			<div class="col-xs-3">
				<a href="{{ url('/admin/eventos/create')}}" class="btn btn-primary login">Agregar Evento</a>
			</div>
		</div>

		<div class="row"><br></div>

		<div class="list-group col-md-10 col-md-offset-1">
			@foreach($eventos as $evento)
				<div class="list-group-item container-fluid">
					<div class="col-xs-5 nombre"><a class="verde2" href="/admin/eventos/{{ $evento->id }}/edit" title="Ver el detalle de {{ $evento->title }}">{{ $evento->title }}</a></div>
					<div class="col-xs-5 date"><a class="verde2" href="/admin/eventos/{{ $evento->id }}/edit" title="Ver el detalle de {{ $evento->date }}">{{ $evento->date }}</a></div>
					<div class="col-xs-1 hidden-xs"><a href="/admin/eventos/{{ $evento->id }}/edit" class="black glyphicon glyphicon-edit"></a></div>
					<div class="col-xs-1 hidden-xs"><a href="/admin/eventos/{{ $evento->id }}/edit" class="black glyphicon glyphicon-remove"></a></div>
				</div>
			@endforeach
		</div>

		<div class="pagination-container text-center">{!! $eventos->render() !!}</div>
	</div>	
@stop