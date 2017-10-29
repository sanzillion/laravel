<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admin;
use App\Msg;
use App\User;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin', ['only' => ['index', 'passupdate']]);
        $this->middleware('auth', ['only' => ['show', 'store', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find(auth()->user()->id);
        $msgs = Msg::paginate(5);
        session(['page' => 'acc']);
        return view('admin.account', compact(['admin', 'msgs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        if(!Hash::check(request()->Old_password, $user->password)){
            return redirect()->back()->withErrors(['Old password do not match']);
        }

        $this->validate(request(), [
            'password' => 'required|confirmed|min:6'
        ]);

        $user->password = bcrypt(request('password'));
        $user->update();

        session()->flash('message', 'Password updated!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts;
        return view('sessions.useraccount', compact(['posts', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required|unique:users,name,' . $user->id,   
            'email' => 'required|email|unique:users,email,' . $user->id,
            'institution' => 'required',
            'phone_number' => 'required|numeric|min:12',
            'city' => 'required'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->phone_number = request('phone_number');
        $user->institution = request('institution');
        $user->city = request('city');

        $user->save();

        session()->flash('message', 'Account updated!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passupdate(Admin $admin)
    {
        if(!Hash::check(request()->Old_password, $admin->password)){
            return redirect()->back()->withErrors(['Old password do not match']);
        }

        $this->validate(request(), [
            'password' => 'required|confirmed|min:6'
        ]);

        $admin->password = bcrypt(request('password'));
        $admin->update();

        session()->flash('message', 'Password updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
