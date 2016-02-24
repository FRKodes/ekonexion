<?php

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
Route::get('inscribe-tu-negocio', 'PagesController@inscribe');
Route::get('aviso-de-privacidad', 'PagesController@aviso');
Route::get('negocio/{id}', 'PagesController@itemDetalle');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
