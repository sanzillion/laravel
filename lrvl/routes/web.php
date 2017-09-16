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

Route::get('/', 'PostController@index')->name('home');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{posts}', 'PostController@show');

Route::post('/posts/{posts}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');




Route::get('/about', function () {
    return view('about');
});

Route::get('/test', 'TaskController@index'); //class@method
Route::get('/test/{task}', 'TaskController@show');


// dd($id);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
