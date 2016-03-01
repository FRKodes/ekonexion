var elixir = require('laravel-elixir');
require('laravel-elixir-stylus');
require('laravel-elixir-livereload');

elixir(function(mix) {
	mix.stylus('main.styl')
		.styles([
			'public/css/bootstrap.min.css',
			'public/css/icons-font.css',
			'public/css/slick.css',
			'public/css/main.css'
		],'public/css/all.min.css', 'public/css')
		.scripts([
			'public/js/jquery.js',
			'public/js/bootstrap.js',
			'public/js/slick.js',
			'public/js/custom.js'
		],'public/js/all.min.js', 'public/js')
		.version(['public/css/all.min.css', 'public/js/all.min.js']);
	mix.livereload();
});