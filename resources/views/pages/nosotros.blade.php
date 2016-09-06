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
				<p>Somos un grupo de personas interesadas en difundir el mas puro arte de la sanación hacia uno mismo, estamos convencidos que el ser humano es también ser espiritual y que la transformación viene desde dentro.	</p>
				<p>"Cuando fluyes en armonía con el universo, las casualidades dejan de serlo para convertirse en sincronicidades”</p>
				<p>Queremos difundir las diferentes terapias y ritos de sanación al alcance de todos, es por eso que hemos creado este directorio, donde encontrarás todo tipo de terapias alternativas y metodologías para equilibrar tu energía y que puedas salir adelante día con día.</p>
				<p>A través del tiempo, todos hemos buscado la sanación espiritual de alguna u otra forma, meditación, cantos, rezos, plantas medicinales, etc. y aquí queremos presentarte a toda esa gente que como tu ha estado en esa búsqueda y a través de sus terapias, metodologías y demás puede acompañarte en tu proceso. Y como decía un anciano lakota: </p>
				<p>"LLEGARÁ UN DÍA EN QUE EL HOMBRE BLANCO MIRARÁ ASOMBRADO COMO SUS HIJOS E HIJAS ADOPTAN LA MANERA INDIA PARA ENTENDER LO QUE SUS PADRES NO ENTENDIERON”</p>
				<p>Por el momento incluimos en este directorio a terapeutas establecidos en México, si estas establecido en otro país y te interesa unirte a nuestro directorio escríbenos a: <a href="mailto:theshamanicjourney@gmail.com" title="Envíanos un correo" target="_blank">theshamanicjourney@gmail.com</a></p>
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