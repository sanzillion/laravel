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
Route::get('/', 'TestController@index')->name('home');
Route::get('/about', 'TestController@about');
Route::get('/members', 'TestController@members');
Route::get('/developers', 'TestController@devs');
Route::get('/stories', 'PostsController@index');
Route::get('/register', 'TestController@register');

// Route::get('/', 'PostsController@index')->name('home');
Route::get('/home', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store')->name('post');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments/{user}', 'CommentsController@store');
Route::delete('/comments/{comment}/delete', 'CommentsController@destroy');
Route::put('/comments/{comment}', 'CommentsController@update');
Route::get('/comments/{comment}', 'CommentsController@edit');

Route::get('/apply', 'PendingUserController@create');
Route::post('/apply', 'PendingUserController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/session/{var}', 'SessionsController@menu');

Route::get('/admin/login', 'Auth\AdminLoginController@show')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@create')->name('admin.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@destroy');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/passowrd/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::group(['middleware' => 'revalidate'], function(){

	Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
	Route::get('/admin/manage', 'AdminController@users');

	Route::get('/master', 'AdminController@master')->name('admin.master');
	Route::put('/master/{admin}', 'AdminController@update');
	Route::get('/master/{admin}', 'AdminController@edit');
	Route::delete('/master/{admin}', 'AdminController@destroy');
	Route::post('/master/create', 'AdminController@create');
	Route::post('/master/delete', 'AdminController@deleteAdmins');
	Route::get('/master/{admin}/search', 'AdminController@search');

	Route::get('/admin/users', 'AdminController@getUsers');

	Route::get('/admin/{user}/edit', 'UserController@edit');
	Route::get('/admin/{user}/search', 'UserController@search');
	Route::patch('/admin/{user}', 'UserController@update');
	Route::delete('/admin/{user}', 'UserController@destroy');

	Route::post('/user/delete', 'UserController@deleteUsers');

	Route::get('/pending/{post}', 'PendingController@show');
	Route::get('/approve/{post}', 'PendingController@create');
	Route::delete('/delete/{post}', 'PendingController@destroy');

	Route::get('/blog/posts', 'BlogController@getPosts');
	Route::get('/blog', 'BlogController@index');
	Route::get('/blog/{string}/search', 'BlogController@search');
	Route::get('/blog/{post}', 'BlogController@show');
	Route::post('/blog/deleteAll', 'BlogController@deleteAll');

	Route::get('/register/{pending}', 'RegistrationController@store');
	Route::delete('/pendinguser/{pending}', 'PendingUserController@destroy');

	Route::post('/file/create', 'FileController@create');
	Route::get('/file', 'FileController@index');
	Route::get('/files/get', 'FileController@getFiles');
	Route::get('/file/{files}/search', 'FileController@search');
	Route::get('/file/{file}/edit', 'FileController@edit');
	Route::delete('/file/{file}/delete', 'FileController@destroy');
	Route::put('/file/{folder}/change', 'FileController@change');
	Route::post('/files/all', 'FileController@destroyFiles');

	Route::post('/folder/create', 'FolderController@create');

	Route::get('/container', 'FolderController@get');
	Route::get('/container/all', 'FolderController@allFolders');
	Route::delete('/container/{folder}/delete', 'FolderController@destroy');

	Route::get('/sms', 'SmsController@index');
	Route::get('/sms/{sms}/edit', 'SmsController@edit');
	Route::put('/sms/{sms}/update', 'SmsController@update');

	Route::post('/send/create', 'SendController@create');
	Route::get('/get/{code}', 'SendController@get');

});

//download any file from directory
Route::get('/download/{file}', 'DownloadsController@download');

Route::get('/stat', 'StatController@get');
Route::get('/stat/all', 'StatController@everything');