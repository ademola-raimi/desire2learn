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
    'as'   => 'home',
]);

Route::get('/signup', [
	'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'auth.register',
]);

Route::get('/login', [
	'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'auth.login',
]);

Route::post('/login/user', [
	'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'auth.post-login',
]);
