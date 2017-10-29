<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Entry;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

        session()->flash('message', 'User updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->posts->delete();
        foreach($user->posts as $post){
            $post->delete();
        }

        foreach($user->entry as $pending_post){
            $pending_post->delete();
        }
        
        $user->delete();
        session()->flash('message', 'User has been deleted!');
        return redirect()->back();
    }

    public function search($string){

        $results = User::where('name', 'like', "$string%")
        ->orWhere('email', 'like', "$string%")
        ->orWhere('phone_number', 'like', "$string%")
        ->orWhere('institution', 'like', "$string%")
        ->orWhere('city', 'like', "$string%")
        ->get();

        return $results;
    }

    public function deleteUsers(){
        Post::truncate();
        User::truncate();
        Entry::truncate();

        session()->flash('message', 'Deleted Successfully!');
        return redirect()->back();
    }
}
