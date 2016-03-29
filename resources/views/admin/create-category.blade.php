@extends('admin')

@section('titlePage', 'Agregar Categoría')

@section('content')
	<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					
					@if(Session::has('added_successfuly'))
						<div class="alert alert-success text-center">{!! Session::get('added_successfuly') !!}</div>
					@endif
					
					@if(Session::has('images_failed'))
						<div class="alert alert-danger text-center">{!! Session::get('images_failed') !!}</div>
					@endif

					<h1 class="handlee text-center verde2">Agregar una categoría</h1>

					@if ($errors->any())
						<div class="alert alert-danger">
							<p class="text-center">Hubo un problema al agregar la categoría.<br><br></p>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(['class'=>'form-horizontal', 'role'=>'form', 'url'=>'admin/categories', 'id'=>'categoriesForm', 'files'=>true]) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group"><input type="text" class="form-control" name="name" placeholder="*Nombre de la categoría" value="" data-validate="required"></div>

						<div class="form-group"><button type="submit" class="btn btn-primary login">AGREGAR</button></div>
					{!! Form::close() !!}
				</div>
			</div>

		</div>
@stop