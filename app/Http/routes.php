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

Route::get('signup', [
	'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'register',
]);

Route::post('signup/new', [
	'uses' => 'Auth\AuthController@postRegister',
	'as'   => 'create-new-user',
    'middleware' => ['guest']
]);

Route::get('login', [
	'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login',
]);

Route::post('login/user', [
	'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'post-login',
    'middleware' => ['guest']
]);

Route::get('logout', [
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

    Route::get('video/create', [
        'uses' => 'VideoController@createVideo',
        'as'   => 'create.video',
    ]);

    Route::post('video/create', [
        'uses' => 'VideoController@postVideo',
        'as'   => 'post.video',
    ]);

    Route::get('category/create', [
        'uses' => 'CategoryController@createCategory',
        'as'   => 'create.category',
    ]);

    Route::post('category/create', [
        'uses' => 'CategoryController@postCategory',
        'as'   => 'post.category',
    ]);

});

/*
|--------------------------------------------------------------------------
| profile Routes- index
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'profile'], function () {
    
    Route::get('edit', [
        'uses'       => 'ProfileController@getProfileSettings',
        'as'         => 'edit-profile',
        'middleware' => ['auth'],
    ]);

    Route::post('edit', [
        'uses' => 'ProfileController@updateProfileSettings',
        'as'   => 'post-profile',
    ]);

    Route::post('/avatar/setting', [
        'uses'       => 'ProfileController@postAvatarSetting',
        'as'         => 'post-avatar',
        'middleware' => ['auth'],
    ]);

    Route::get('changepassword', [
        'uses'       => 'ProfileController@getChangePassword',
        'as'         => 'changepassword',
        'middleware' => ['auth'],
    ]);

    Route::post('changepassword', [
        'uses' => 'ProfileController@postChangePassword',
        'as'   => 'post-changepassword',
    ]);
});

/*
|--------------------------------------------------------------------------
| video Routes- index
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'video'], function () {
    Route::get('/', [
        'uses' => 'VideoController@getAllVideos',
        'as'   => 'all-videos',
        'middleware' => ['auth'],
    ]);

    Route::get('{id}', [
        'uses' => 'VideoController@showVideo',
        'as'   => 'show_video',
        'middleware' => ['auth'],
    ]);
});

/*
|--------------------------------------------------------------------------
| social login 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/{provider}', 'middleware' => ['web']], function () {
    Route::get('/', 'Auth\OauthController@redirectToProvider');
    Route::get('/callback', 'Auth\OauthController@handleProviderCallback');
});
