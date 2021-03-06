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

use \App\Post;

Route::get('/', function () {
    return view('posts.index');
});

Route::get('/post/{id}', function ($id) {
	return view('posts.page')->withId($id);
});

Route::auth();

Route::get('/admin', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/admin/post', 'AdminPostController');
	Route::post('/admin/post/restore/{id}', 'AdminPostController@restore');
	Route::delete('/admin/post/delete/{id}', 'AdminPostController@delete');
});
