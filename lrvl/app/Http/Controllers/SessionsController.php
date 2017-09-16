<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function __construct(){
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function create(){
    	return view('sessions.create');
    }	

    public function store(){
		//authenticate

//		dd(request(['email', 'password']));
    	if(! auth()->attempt(request(['email', 'password']))){
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again'
    		]);
    	}
		//if not redirect back    	

		//redirect
		return redirect('/');
    }

    public function destroy(){
    	auth()->logout();
    	return redirect('/');
    }

}
