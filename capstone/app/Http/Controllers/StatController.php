<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stat;

class StatController extends Controller
{

	function __construct(){
    	$this->middleware('auth:admin')->except(['get']);
	}

    function get(){
    	header("Access-Control-Allow-Origin: *");
    	return Stat::all();
    }
}
