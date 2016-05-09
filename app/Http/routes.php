<?php

/*
|--------------------------------------------------------------------------
| Application Routes- index
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'index',
]);

Route::get('/signup', [
	'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'auth.register',
]);

Route::post('signup/new', [
	'uses' => 'Auth\AuthController@postRegister',
	'as'   => 'auth.create-new-user',
]);

Route::get('/login', [
	'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'auth.login',
]);

Route::post('/login/user', [
	'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'auth.post-login',
]);

Route::get('/logout', [
    'uses' => 'Auth\AuthController@logOut',
    'as'   => 'auth.logout'
]);
