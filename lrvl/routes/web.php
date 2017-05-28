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

Route::get('/', function () {
    return view('welcome', [
        'name' => 'Sanz',
        'lastname' => 'Moses'
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function(){
	$task = DB::table('tasks')->get();
	return view('test', compact('task'));
});

Route::get('/test/{task}', function($id){
	
	$task = DB::table('tasks')->find($id);
	return view('test.show', compact('task'));
});

// dd($id);