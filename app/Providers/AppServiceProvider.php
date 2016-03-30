<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Banner;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$banners_footer = Banner::where('place', '=', 'footer')->where('status', '=', 1)->get();
		view()->share('banners_footer', $banners_footer);
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		if ($this->app->environment() == 'local') {
		    $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
		}
	}

}
