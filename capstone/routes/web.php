<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostsController@index')->name('home');
Route::get('/home', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store')->name('post');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments/{user}', 'CommentsController@store');
Route::put('/comments/{comment}', 'CommentsController@update');
Route::get('/comments/{comment}', 'CommentsController@edit');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/admin/login', 'Auth\AdminLoginController@show')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@create')->name('admin.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@destroy');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/master', 'AdminController@master')->name('admin.master');


Route::post('/password/email', 'Auth\ForgotPasswordController@showLinkRequestFrom')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
Route::post('/passowrd/reset', 'Auth\ResetPasswordController@showResetForm');
Route::get('/passowrd/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');