<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tracker extends Model
{
    protected $guarded  = [];

    public static function log($name, $type, $action, $description){

    	Tracker::create([
                'user' => $name,
                'type' => $type,
                'action' => $action,
                'description' => $description
            ]);
    }

    public static function lastout($id){
        try{
        return Tracker::where('user', $id)
            ->where('action', 'Admin Logout')
            ->orderBy('created_at', 'desc')
            ->first()
            ->created_at
            ->toDateString();
        }
        catch(\Exception $e){
            return (new Carbon('tomorrow'))->format('Y-m-d');
        }
    	
    }

    public static function firstTime($id){
    	$count = Tracker::where('user', $id)
    		->where('action', 'Admin Login')
    		->count();
    	if($count == 1){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function admin(){
    	$this->belongsTo(Admin::class);
    }

    public function user(){
    	$this->belongsTo(User::class);
    }
}
