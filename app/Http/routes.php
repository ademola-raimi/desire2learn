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
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('index', [
        'uses' => 'DashboardController@index',
        'as'   => 'dashboard.home',
    ]);

    Route::get('video/create', [
        'uses' => 'VideoController@createVideo',
        'as'   => 'create.video',
    ]);

    Route::post('video/create', [
        'uses' => 'VideoController@postVideo',
        'as'   => 'post.video',
    ]);

    Route::get('video/upload', [
        'uses' => 'DashboardController@uploadedVideos',
        'as'   => 'uploaded.video',
    ]);

    Route::get('/category', [
        'uses' => 'DashboardController@showCategories',
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

    Route::get('/', [
        'uses' => 'VideoController@getAllVideos',
        'as'   => 'all-videos',
    ]);

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
Route::post('/video/like/{id}', [
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

    Route::put('comment/{id}/edit', [
        'uses' => 'CommentController@editComment'
    ]);

    Route::delete('comment/{commentId}', [
        'uses' => 'CommentController@deleteComment'
    ]);
});

/*
|--------------------------------------------------------------------------
| Video Routes   
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/video', 'middleware' => 'auth'], function () {

    Route::get('/edit/{id}', [
        'uses' => 'VideoController@edit',
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

    Route::get('/{categoryId}', [
        'uses' => 'CategoryController@showVideoCategory',
        'as' => 'show-video-category'
    ]);

    Route::get('/create', [
        'uses' => 'CategoryController@createCategory',
        'as'   => 'create-category',
    ]);

    Route::post('/create', [
        'uses' => 'CategoryController@postCategory',
        'as'   => 'post.category',
    ]);

    Route::get('{id}', [
        'uses' => 'CategoryController@showSingleCategory',
        'as'   => 'show-single-category',
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as'   => 'edit-video'
    ]);

    Route::post('/edit/{id}/update', [
        'uses' => 'CategoryController@update',
        'as'   => 'update-video'
    ]);
});

/*
|--------------------------------------------------------------------------
| Delete category Routes   
|--------------------------------------------------------------------------
*/
Route::get('category/delete/{id}', [
    'uses' => 'CategoryController@destroy',
    'as'   => 'delete-category',
    'middleware' => 'category-delete',
]);
