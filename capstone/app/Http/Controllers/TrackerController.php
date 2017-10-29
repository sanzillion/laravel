<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Tracker;
use Illuminate\Http\Request;

class TrackerController extends Controller
{

	public function __construct(){
		$this->middleware('auth:admin');
	}

    public function getLogs(){
		return $logs = Tracker::latest()->paginate(5);
    }

    public function search($string){
        $results = Tracker::where('user', 'like', "$string%")
        ->orWhere('type', 'like', "$string%")
        ->orWhere('action', 'like', "$string%")
        ->orWhere('created_at', 'like', "$string%")->take(5)->get();

        return $results;
    }

    public function deleteAll(){
        Tracker::truncate();

        session()->flash('message', 'Activity Entries Cleared!');
        return redirect('/master');
    }

    public function forceOut(){

    	$dir = storage_path().'/framework/sessions';

	    foreach(glob("{$dir}/*") as $file)
	    {
	        if(is_dir($file)) { 
	            recursiveRemoveDirectory($file);
	        } else {
	            unlink($file);
	        }
	    }

	    Tracker::log(auth()->user()->name, 'Logout', 'Force Log Out');
    	session()->flash('message', 'Successfully log out all users/admins!');
        return redirect('/master');
    }
}

