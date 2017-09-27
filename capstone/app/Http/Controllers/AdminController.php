<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
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
            $pendings = Application::all();
            $users = User::all();

    		return view('admin.master', compact(['pendings', 'users']));
    	}
    	return redirect('/admin')->with(['message' => 'unauthorize']);
    }
}
