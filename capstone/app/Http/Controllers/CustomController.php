<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;
use App\User;
use App\Custom;

class CustomController extends Controller
{

    public function __construct(){
    	$this->middleware('auth:admin');
    }
 
    public function index(Sms $sms){
    	$users = User::all();
    	$customs = Custom::where('type', $sms->recipient)->paginate(10);
    	return view('admin.custom', compact(['sms', 'customs', 'users']));
    }

    public function create(){
    	// dd(request()->all());
    	$count = 0;
    	
    	for($x = 0; $x < count(request()->name); $x++){
	        $this->validate(request() ,[
	            'name.'.$x => 'required|unique:customs,name',
	            'phone.'.$x => 'required|numeric|min:12',
	        ]);
    	}

    	for($y = 0; $y < count(request()->name); $y++){
    		Custom::create([
    			'name'=>request('name')[$y],
    			'phone_number'=>request('phone')[$y],
    			'type'=>request('recipient')
    		]);
    	}

    	session()->flash('message', 'Added Successfully!');
        return redirect()->back();
    }

    public function edit(Custom $custom){
        return $custom;
    }

    public function update(Custom $custom){
        $this->validate(request(), [
            'name' => 'required|unique:customs,name,' . $custom->id,   
            'phone' => 'required|numeric|min:12'
        ]);

        $custom->name = request('name');
        $custom->phone_number = request('phone');
        $custom->save();

        session()->flash('message', 'Updated Successfully!');
        return redirect()->back();
    }

    public function destroy(Sms $sms){
        Custom::where('type', $sms->recipient)->delete();
        $sms->delete();

        session()->flash('message', 'Deleted Successfully!');
        return redirect('/sms');
    }

    public function delete(Custom $recipient){
    	$recipient->delete();

        session()->flash('message', 'Deleted Successfully!');
        return redirect()->back();
    }

    public function populate(){
    	// dd(request()->all());
    	if(request('user') !== null){
	    	for($x = 0; $x < count(request()->user); $x++){
		        $this->validate(request() ,[
		            'user.'.$x => 'required|unique:customs,name',
		            'num.'.$x => 'required|numeric|min:12',
		        ]);
	    	}

	    	for($y = 0; $y < count(request()->user); $y++){
	    		Custom::create([
	    			'name'=>request('user')[$y],
	    			'phone_number'=>request('num')[$y],
	    			'type'=>request('recipient')
	    		]);
	    	}
    	}
    	else{
    		return redirect()->back()->withErrors('pls be serious');	
    	}

        session()->flash('message', 'Added Successfully!');
        return redirect()->back();
    }
}
