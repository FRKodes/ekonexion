<div class="container footer-banner">
	<div class="row">
		@if(count($banners_footer)>0)
			<div class="home-slider">
				@foreach ($banners_footer as $banner_footer)
					<div class="item text-center" style="background-image: url({{ $banner_footer->imagen }})">
						<a href="{{ $banner_footer->link }}" class="blanco" target="_blank">
							<p class="title handlee">{{ $banner_footer->title }}</p>
							<p class="description">{{ $banner_footer->description }}</p>
						</a>
					</div>
				@endforeach
			</div>
		@endif
	</div>
</div>

<footer>
	<div class="container">
		<div class="col-sm-4">
			<p class="contact handlee">Contáctanos</p>
			<p>Teléfono: <br><span class="verde3">(00) 0000 0000</span></p>
		</div>
		<div class="col-sm-4">
			<p> Síguenos en Facebook </p>
			<div class="fb-like" data-href="https://www.facebook.com/elsenderodelchaman" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
		</div>
		<div class="col-sm-4">
			<p>
				Informes: <br><a href="mailto:theshamanicjourney@gmail.com" title="Enviar un correo a theshamanicjourney@gmail.com">theshamanicjourney@gmail.com</a>
			</p>
		</div>
	</div>
</footer>