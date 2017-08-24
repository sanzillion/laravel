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

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
// Route::get('/posts/{posts}', 'PostController@show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', 'TaskController@index'); //class@method
Route::get('/test/{task}', 'TaskController@show');


// dd($id);