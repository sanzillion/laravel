<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;
use App\Send;

class SmsController extends Controller
{

    public function __construct(){
    	$this->middleware('auth:admin');
    }
    
	public function index(){

    	session(['page' => 'sms']);

    	$sms = Sms::all();
    	$pendings = Send::all();
    	return view('admin.sms', compact(['sms', 'pendings']));
	}

	public function edit(Sms $sms){
		return $sms;
	}

	public function update(Sms $sms){

		$sms->body = request('body');
		$sms->save();

		session()->flash('message', 'Text body updated!');
		return redirect('/sms');

	}
}
