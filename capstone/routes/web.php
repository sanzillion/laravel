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

Route::get('/apply', 'PendingUserController@create');
Route::post('/apply', 'PendingUserController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/session/{var}', 'SessionsController@menu');

Route::get('/admin/login', 'Auth\AdminLoginController@show')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@create')->name('admin.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@destroy');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

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

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/passowrd/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/register/{pending}', 'RegistrationController@store');
Route::delete('/pendinguser/{pending}', 'PendingUserController@destroy');

Route::post('/file/create', 'FileController@create');
Route::get('/file', 'FileController@index');
Route::get('/files/get', 'FileController@getFiles');
Route::get('/file/{files}/search', 'FileController@search');
Route::get('/file/{file}/edit', 'FileController@edit');
Route::delete('/file/{file}/delete', 'FileController@destroy');

Route::post('/folder/create', 'FolderController@create');

Route::get('/container', 'FolderController@get');
Route::get('/container/all', 'FolderController@allFolders');
Route::delete('/container/{folder}/delete', 'FolderController@destroy');

//download any file from directory
Route::get('/download/{file}', 'DownloadsController@download');