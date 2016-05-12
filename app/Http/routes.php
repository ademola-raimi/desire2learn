<?php

/*
|--------------------------------------------------------------------------
| Application Routes- index
|--------------------------------------------------------------------------
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

/*
|--------------------------------------------------------------------------
| Dashboard Routes- index
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'dashboar'], function () {

    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as'   => 'dashboard.index',
    ]);

});
