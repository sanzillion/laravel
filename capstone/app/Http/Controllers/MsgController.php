<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Msg;

class MsgController extends Controller
{
	public function __construct(){
		$this->middleware('guest')->except(['get', 'destroy']);
	}

    public function store(){
    	// dd(request()->all());

    	$this->validate(request(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:100',
            'phone_number' => 'required|numeric|min:10',
            'msg' => 'required'
    	]);

    	Msg::create([
    		'from' => request('name'),
    		'to' => 'Admins',
    		'msg' => request('msg'),
    		'email' => request('email'),
    		'phone' => request('phone_number')
    	]);

        session()->flash('message', 'Sent Successfully');
    	return redirect()->back();
    }

    public function get(Msg $msg){
        return $msg;
    }

    public function destroy(Msg $msg){
        $msg->delete();

        session()->flash('message', 'Msg Deleted!');
        return redirect()->back();
    }
}
