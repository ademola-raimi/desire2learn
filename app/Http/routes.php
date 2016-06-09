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

Route::get('category/{id}/videos', [
    'uses' => 'CategoryController@showVideoCategories',
    'as' => 'show-video-category'
]);

Route::get('all/videos', [
    'uses' => 'CategoryController@showAllVideos',
    'as' => 'show-all-category'
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

    Route::get('video/uploaded', [
        'uses' => 'DashboardController@uploadedVideos',
        'as'   => 'uploaded.video',
    ]);

    Route::get('video/favourited', [
        'uses' => 'DashboardController@favouritedVideos',
        'as'   => 'favourited.video',
    ]);

    Route::get('/category', [
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
Route::group(['middleware' => 'auth'], function () {

    Route::get('/comment', [
        'uses' => 'CommentController@fetchComment'
    ]);

    Route::post('/comment', [
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

    Route::get('/edit/{id}', [
        'uses' => 'VideoController@getVideoEditForm',
        'as'   => 'edit-video'
    ]);

    Route::post('/edit/{id}/update', [
        'uses' => 'VideoController@update',
        'as'   => 'update-video'
    ]);

    Route::get('/delete/{id}', [
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

    Route::get('/edit/{id}', [
        'uses' => 'CategoryController@getCategoryEditForm',
        'as'   => 'edit-video'
    ]);

    Route::post('/edit/{id}/update', [
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
    Route::get('category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as'   => 'delete-category',
    ]);

    Route::get('/dashboard/new/superadmin', [
        'uses' => 'DashboardController@getSuperAdminForm',
        'as'   => 'admin-form',
    ]);

    Route::post('/dashboard/new/superadmin', [
        'uses'       => 'DashboardController@createAdmin',
        'as'         => 'post.superadmin',
    ]);
});
