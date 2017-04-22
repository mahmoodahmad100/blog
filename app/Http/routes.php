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

Route::get('auth/login','Auth\AuthController@getLogin')->name('signin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout')->name('signout');

Route::get('auth/register','Auth\AuthController@getRegister')->name('signup');
Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset','Auth\PasswordController@reset');

Route::resource('categories','CategoryController',['except' => ['create']]);
Route::resource('tags','TagController',['except' => ['create']]);

Route::post('comments/{post_id}',['uses' => 'CommentController@store' , 'as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentController@edit' , 'as' => 'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentController@update' , 'as' => 'comments.update']);
Route::delete('comments/{id}',['uses' => 'CommentController@destroy' , 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete',['uses' => 'CommentController@delete' , 'as' => 'comments.delete']);

Route::get('/',[
		'uses' => 'PagesController@getWelcome',
		'as' => 'welcome'
	]);
Route::get('about',[
		'uses' => 'PagesController@getAbout',
		'as' => 'about'
	]);

Route::get('contact',[
		'uses' => 'PagesController@getContact',
		'as' => 'contact'
	]);

Route::post('contact',[
		'uses' => 'PagesController@postContact',
		'as' => 'postcontact'
	]);

Route::resource('posts','PostController');

Route::get('blog/{slug}',[
	'uses' => 'BlogController@getSingle',
	'as' => 'blog.single'
]);

Route::get('blog',[
	'uses' => 'BlogController@getIndex',
	 'as' => 'blog.index'
]);
