<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Stats;
use Auth;
use App\Admin;
use App\Tracker;

class AdminLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:admin', ['except' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        
        if(!$count = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ])->withInput($request->only('email', 'remember'));
        }

        Tracker::log($admin->id, 'admin', 'Admin Login', 'Attempt: '.$count);
        session(['menu' => 'active', 'appStatus' => 'undefined']);
        event(new Stats('a_log'));

        if($admin->isMaster()){
            return redirect()->route('admin.master');
        }

        return redirect()->route('admin.dashboard');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.admin-login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Tracker::log(Auth::guard('admin')->user()->id, 'admin', 'Admin Logout', 'None');
        Auth::guard('admin')->logout();

        return redirect()->home();
    }
}
