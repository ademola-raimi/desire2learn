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

Route::post('user/new', [
	'uses'       => 'Auth\AuthController@postRegister',
	'as'         => 'create-new-user',
    'middleware' => ['guest']
]);

Route::get('login', [
	'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login',
]);

Route::post('user/login', [
	'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'post-login',
    'middleware' => ['guest']
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@logOut',
    'as'   => 'logout'
]);

Route::get('category/{id}/videos', [
    'uses' => 'CategoryController@showVideoCategories',
    'as'   => 'show-video-category'
]);

Route::get('videos', [
    'uses' => 'CategoryController@showAllVideos',
    'as'   => 'show-all-category'
]);

/*
|--------------------------------------------------------------------------
| Dashboard Routes- index
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as'   => 'dashboard.home',
    ]);

    Route::get('video/create', [
        'uses' => 'VideoController@getVideoForm',
        'as'   => 'create.video',
    ]);

    Route::post('video/create', [
        'uses' => 'VideoController@validateVideoData',
        'as'   => 'post.video',
    ]);

    Route::get('video/uploads', [
        'uses' => 'DashboardController@uploadedVideos',
        'as'   => 'video.uploads',
    ]);

    Route::get('video/favourites', [
        'uses' => 'DashboardController@favouritedVideos',
        'as'   => 'video.favourites',
    ]);

    Route::get('/categories', [
        'uses' => 'DashboardController@showAllCategories',
        'as'   => 'all.categories',
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

    Route::post('settings/avatar', [
        'uses'       => 'ProfileController@postAvatarSetting',
        'as'         => 'post-avatar',
        'middleware' => ['auth'],
    ]);

    Route::get('changepassword', [
        'uses'       => 'Auth\AuthController@getChangePassword',
        'as'         => 'changepassword',
        'middleware' => ['auth'],
    ]);

    Route::post('changepassword', [
        'uses' => 'Auth\AuthController@postChangePassword',
        'as'   => 'post-changepassword',
    ]);
});

/*
|--------------------------------------------------------------------------
| video Routes- index
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'video'], function () {

    Route::get('{id}', [
        'uses' => 'VideoController@showVideo',
        'as'   => 'show_video',
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

/*
|--------------------------------------------------------------------------
| Like  
|--------------------------------------------------------------------------
*/
Route::post('/video/{id}/like', [
    'uses' => 'LikeController@postLikeVideo',
    'as' => 'like'
]);

/*
|--------------------------------------------------------------------------
| Comment  
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'video', 'middleware' => ['auth']], function () {

    Route::get('{id}/comments', [
        'uses' => 'CommentController@fetchComment'
    ]);

    Route::post('{id}/comments/', [
        'uses' => 'CommentController@postComment',
        'as' => 'comment',
    ]);
});

/*
|--------------------------------------------------------------------------
| Video Routes   
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/video', 'middleware' => 'auth'], function () {

    Route::get('{id}/edit', [
        'uses' => 'VideoController@getVideoEditForm',
        'as'   => 'edit-video'
    ]);

    Route::post('{id}/edit/', [
        'uses' => 'VideoController@update',
        'as'   => 'update-video'
    ]);

    Route::get('/{id}/delete', [
        'uses' => 'VideoController@destroy',
        'as'   => 'delete-video'
    ]);
});

/*
|--------------------------------------------------------------------------
| category Routes   
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'category', 'middleware' => 'superadmin.user'], function () {

    Route::get('/uploaded', [
        'uses' => 'DashboardController@uploadedCategory',
        'as'   => 'uploaded.categories',
    ]);

    Route::get('/create', [
        'uses' => 'CategoryController@createCategory',
        'as'   => 'create-category',
    ]);

    Route::post('/create', [
        'uses' => 'CategoryController@postCategory',
        'as'   => 'post.category',
    ]);

    Route::get('{id}/edit/', [
        'uses' => 'CategoryController@getCategoryEditForm',
        'as'   => 'edit-video'
    ]);

    Route::post('{id}/edit', [
        'uses' => 'CategoryController@update',
        'as'   => 'update-video'
    ]);
});

/*
|--------------------------------------------------------------------------
| special users Routes   
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'superadmin.user'], function () {
    Route::get('category/{id}/delete', [
        'uses' => 'CategoryController@destroy',
        'as'   => 'delete-category',
    ]);

    Route::get('/dashboard/admin/new', [
        'uses' => 'DashboardController@getSuperAdminForm',
        'as'   => 'admin-form',
    ]);

    Route::post('/dashboard/admin/new/', [
        'uses'       => 'DashboardController@createSuperAdmin',
        'as'         => 'post.superadmin',
    ]);
});
