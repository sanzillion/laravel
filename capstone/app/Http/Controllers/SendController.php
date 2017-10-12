<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ApiResponse;
use App\Sms;
use App\Send;
use App\User;
use App\Admin;

class SendController extends Controller
{

	public function __construct(){
		$this->middleware('auth:admin')->except('get');
	}
    
	public function create(){
		$id = request('body');
		$sms = Sms::find($id);

		// dd($sms->recipient);
		Send::create([
			'sender'=>$sms->sender,
			'recipient'=>$sms->recipient,
			'body'=>$sms->body
		]);

		session()->flash('message', 'This may take a minute to send!');
		return redirect('/sms');

	}

	public function get($code){
		if($code != 123456789){
			return "Unauthorize!";
		}
		else{
			$sms = Send::all();

			if($sms->isEmpty()){
				return "No results";
			}

			//fire truncate event for SEND table
			event(new ApiResponse());

			foreach($sms as $sm){
				$sms = $sm;
			} 

			$array = [];
			$array[0] = $sms->sender;
			$array[1] = $sms->body;

			if($sms->recipient == "Users"){
				$array[2] = User::pluck('phone_number');
			}
			else if($sms->recipient == "Admins"){
				$array[2] = Admin::pluck('phone_number');
			}
			else{
				$user = User::pluck('phone_number');
				$numbers = $user->merge(Admin::pluck('phone_number'));
				$array[2] = $numbers;
			}

			return $array;
		}
	}

	public function truncate(){

	}

}
