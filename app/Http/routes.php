<?php
use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

Route::get('/', 'PagesController@index');
Route::get('nosotros', 'PagesController@nosotros');
Route::get('aviso-de-privacidad', 'PagesController@aviso');
Route::get('negocio/{id}', 'PagesController@itemDetalle');

Route::get('search', 'PagesController@search');
// Route::get('search', function (){
// 	$query = Request::get('q');
// 	return $query;
// });

Route::resource('negocios', 'NegociosController', [
	'except' => [
				'index', 'edit', 'update'
				]
	]);

// Route::get('inscribe-tu-negocio', 'PagesController@inscribe');
// Route::get('negocio/create', 'NegocioController@create');

Route::get('home', 'HomeController@index');

Route::get('roles', function(){
	
	// return User::first()->roles()->attach(1);

	return User::with('roles')->first();

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
	
	Route::get('categories', 'AdminController@categories');
	Route::get('categories/{id}/edit', 'AdminController@editCategory');
	Route::patch('categories/{category}', 'AdminController@updateCategory');

});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
