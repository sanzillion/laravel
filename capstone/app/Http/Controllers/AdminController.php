<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use App\Admin;
use Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }

    public function index(){
        
        $month = date("M");
        session(['page' => 'admin']);

    	return view('admin.dashboard', compact(['month']));
    }

    public function users(){
        //set page for active sidebar
        $pendings = Application::simplePaginate(5);
        session(['page' => 'admin']);

        return view('admin.users', compact(['pendings']));
    }

    public function getUsers(){

        $users = User::paginate(10);
        return $users;
    }

    public function create(){

        $this->validate(request(), [
            'name' => 'required|min:5|unique:admins',
            'email' => 'required|email|min:5|unique:admins',
            'phone_number' => 'required|numeric|min:12|unique:admins',
            'password' => 'required|confirmed|min:6'
        ]);

        $admin = Admin::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
            'phone_number' => request()->phone_number,
            'level' => "administrator",
        ]);

        session()->flash('message', 'Admin registered!');

        return redirect('/master');

    }

    public function edit(Admin $admin){
        return $admin;
    }

    public function update(Admin $admin){

        $this->validate(request(), [
            'name' => 'required|min:5|unique:admins,name,' . $admin->id,
            'email' => 'required|email|min:5|unique:admins,email,' . $admin->id,
            'phone_number' => 'required|numeric|min:12|unique:admins,phone_number,' . $admin->id,
        ]);

        $admin->name = request('name');
        $admin->email = request('email');
        $admin->phone_number = request('phone_number');

        $admin->update();

        session()->flash('message', 'Admin updated!');
        return redirect('/master');

    }

    public function search($string){

        $results = Admin::where('name', 'like', "$string%")
        ->orWhere('phone_number', 'like', "$string%")
        ->orWhere('email', 'like', "$string%")->get();

        return $results;

    }

    public function master(){
        $admins = Admin::where('level', 'administrator')->SimplePaginate(10);

        //set page for active sidebar
        session(['page' => 'master']);

    	if(Auth::user()->isMaster()){
    		return view('admin.master', compact('admins'));
    	}
    	return redirect('/admin')->with(['message' => 'unauthorize']);
    }

    public function destroy(Admin $admin){

        $admin->delete();

        session()->flash('message', 'Deleted Successfully!');
        return redirect('/master');
    }

    public function deleteAdmins(){
        Admin::where('level', 'administrator')->delete();

        session()->flash('message', 'Deleted Successfully!');
        return redirect('/master');
    }

}
