<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;

class SmsController extends Controller
{

    public function __construct(){
    	$this->middleware('auth:admin');
    }
    
	public function index(){

    	session(['page' => 'sms']);

    	$sms = Sms::all();
    	return view('admin.sms', compact('sms'));
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
