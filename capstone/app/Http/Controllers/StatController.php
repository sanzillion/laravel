<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stat;
use App\User;
use App\Post;
use App\File;
use Carbon\Carbon;

class StatController extends Controller
{

	function __construct(){
    	$this->middleware('auth:admin')->except(['get']);
	}

    function get(){
    	header("Access-Control-Allow-Origin: *");
    	return Stat::all();
    }

    function everything(){
    	$month = Carbon::now()->month;
		$array = array(
			'members'=>User::count(),
			'm_members'=>User::whereMonth('created_at', $month)->count(),
			'sms'=>Stat::pluck('sms'),
			'm_sms'=>Stat::where('id', $month)->pluck('sms'),
			'blog'=>Post::count(),
			'm_blog'=>Post::whereMonth('created_at', $month)->count(),
			'files'=>File::count(),
			'm_files'=>File::whereMonth('created_at', $month)->count(),
			'apply'=>Stat::where('id', $month)->pluck('apply'),
			'approve'=>Stat::where('id', $month)->pluck('approve'),
			'download'=>Stat::where('id', $month)->pluck('download'),
			'uptime'=>Stat::pluck('uptime'),
			'm_uptime'=>Stat::where('id', $month)->pluck('uptime')
		);

		return $array;
    }
}
