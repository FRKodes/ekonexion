@if($banners_top)
	<div class="home-slider">
		@foreach ($banners_top as $banner_top)
			<div class="item text-center" style="background-image: url({{ $banner_top->imagen }})">
				<a href="{{ $banner_top->link }}" class="blanco" target="_blank">
					<p class="title handlee">{{ $banner_top->title }}</p>
					<p class="description">{{ $banner_top->description }}</p>
				</a>
			</div>
		@endforeach
	</div>
@endif