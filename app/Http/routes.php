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
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@Logout']);

// Registration route
Route::get('auth/register', ['as' => 'signup', 'uses' => 'Auth\AuthController@getRegister']);

Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password Resets
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

//categories
Route::resource('/categories', 'CategoryController', ['except'=>['create']]);

//tags
Route::resource('/tags', 'TagController', ['except'=>['create']]);

//comments
Route::post('/comments/{post_id}', ['uses'=>'CommentsController@store', 'as'=>'comments.store']);

//main page
Route::get('/', 'PagesController@getIndex');
// about page
Route::get('/about', 'PagesController@getAbout');
//contact page
Route::get('/contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
// managing resources
Route::resource('posts', 'PostController');