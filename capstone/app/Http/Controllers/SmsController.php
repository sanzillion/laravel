<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{

    public function __construct(){
    	$this->middleware('auth:admin');
    }
    
	public function index(){

    	session(['page' => 'sms']);

    	return view('admin.sms');
	}
}
