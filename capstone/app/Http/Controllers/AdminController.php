<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }

    public function index(){
    	return view('admin.admin');
    }

    public function master(){
    	if(Auth::user()->isMaster()){
    		return view('admin.master');
    	}
    	return redirect('/admin')->with(['message' => 'unauthorize']);
    }
}
