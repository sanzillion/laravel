<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;
use App\Send;
use App\User;

class SmsController extends Controller
{

    public function __construct(){
    	$this->middleware('auth:admin');
    }
    
	public function index(){

    	session(['page' => 'sms']);

    	$customs = Sms::where('code', 10)->get();
    	$sms = Sms::all();
    	$pendings = Send::all();
    	$city = User::pluck('city')->toArray();
    	$city = array_unique($city);
    	
    	return view('admin.sms', compact(['sms', 'pendings', 'city', 'customs']));
	}

	public function create(){

		Sms::create([
			'sender' => 'SOSnetwork App',
			'recipient' => request()->name,
			'body' => 'This is a custom msg',
			'code' => 10
		]);

		session()->flash('message', 'Custom msg added!');
		return redirect('/sms');

	}

	public function edit(Sms $sms){
		return $sms;
	}

	public function update(Sms $sms){

		$sms->body = request('body');
		$sms->save();

		session()->flash('message', 'Text body updated!');
		return redirect()->back();

	}
}
