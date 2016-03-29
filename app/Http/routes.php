<?php
Route::get('/', 'PagesController@index');
Route::get('nosotros', 'PagesController@nosotros');
Route::get('aviso-de-privacidad', 'PagesController@aviso');
Route::get('negocio/{id}', 'PagesController@itemDetalle');
Route::get('search', 'PagesController@search');
Route::get('eventos', 'PagesController@eventos');
Route::resource('negocios', 'NegociosController', [
	'except' => ['index', 'edit', 'update']
	]);

Route::get('inscribe-tu-negocio', array('as' => 'negocios/create', 'uses' => 'NegociosController@create'));

Route::get('roles', function(){
	return User::first()->roles()->attach(1);
});

/*admin stuff goes here*/
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin'], 'as'], function (){
	
	Route::get('dashboard', 'AdminController@index');
	Route::get('negocios/{id}/edit', 'AdminController@editNegocio');
	Route::patch('negocios/{negocio}', 'AdminController@updateNegocio');
	Route::delete('negocios/{negocio}', 'AdminController@deleteNegocio');
	
	Route::get('users', 'AdminController@users');
	Route::get('users/{id}/edit', 'AdminController@editUser');
	Route::patch('users/{user}', 'AdminController@update');
	Route::delete('users/{user}', 'AdminController@deleteUser');
	
	Route::get('categories', 'AdminController@categories');
	Route::get('categories/create', 'AdminController@createCategory');
	Route::post('categories', 'AdminController@storeCategory');
	Route::get('categories/{id}/edit', 'AdminController@editCategory');
	Route::patch('categories/{category}', 'AdminController@updateCategory');
	Route::delete('categories/{category}', 'AdminController@deleteCategory');

	Route::get('banners', 'AdminController@banners');
	Route::get('banners/create', 'AdminController@createBanner');
	Route::post('banners', 'AdminController@storeBanner');
	Route::get('banners/{id}/edit', 'AdminController@editBanner');
	Route::patch('banners/{banner}', 'AdminController@updateBanner');
	Route::delete('banners/{banner}', 'AdminController@deleteBanner');

	Route::get('eventos', 'AdminController@eventos');
	Route::get('eventos/create', 'AdminController@createEvento');
	Route::post('eventos', 'AdminController@storeEvento');
	Route::get('eventos/{id}/edit', 'AdminController@editEvento');
	Route::patch('eventos/{evento}', 'AdminController@updateEvento');
	Route::delete('eventos/{evento}', 'AdminController@deleteEvento');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
