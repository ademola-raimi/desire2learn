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
    'as'   => 'register',
    'middleware' => ['guest']
]);

Route::post('signup/new', [
	'uses' => 'Auth\AuthController@postRegister',
	'as'   => 'create-new-user',
    'middleware' => ['auth']
]);

Route::get('/login', [
	'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login',
    'middleware' => ['guest']
]);

Route::post('/login/user', [
	'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'post-login',
    'middleware' => ['guest']
]);

Route::get('/logout', [
    'uses' => 'Auth\AuthController@logOut',
    'as'   => 'logout'
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

    Route::get('/video/create', [
        'uses' => 'VideoController@createVideo',
        'as'   => 'create.video',
    ]);

    Route::post('/video/create', [
        'uses' => 'VideoController@postVideo',
        'as'   => 'post.video',
    ]);

});

/*
|--------------------------------------------------------------------------
| profile Routes- index
|--------------------------------------------------------------------------
*/
Route::get('/profile/edit', [
    'uses'       => 'ProfileController@getProfileSettings',
    'as'         => 'edit-profile',
    'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
    'uses' => 'ProfileController@updateProfileSettings',
    'as'   => 'post-profile',
]);

Route::post('/avatar/setting', [
    'uses'       => 'ProfileController@postAvatarSetting',
    'as'         => 'post-avatar',
    'middleware' => ['auth'],
]);

Route::get('/profile/changepassword', [
    'uses'       => 'ProfileController@getChangePassword',
    'as'         => 'changepassword',
    'middleware' => ['auth'],
]);

Route::post('/profile/changepassword', [
    'uses' => 'ProfileController@postChangePassword',
    'as'   => 'post-changepassword',
]);
