<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct(){
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'news']);
        return view('guest.index');
    }
    
    public function about()
    {
        session(['visit' => 'yes']);
        session(['page' => 'about']);
        return view('guest.about');
    }    
    
    public function members()
    {
        session(['visit' => 'yes']);
        session(['page' => 'members']);
        return view('guest.members');
    }
    
    public function devs()
    {
        session(['visit' => 'yes']);
        session(['page' => 'devs']);
        return view('guest.devs');
    }

    public function stories()
    {
        session(['visit' => 'yes']);
        session(['page' => 'stories']);
        return view('guest.stories');
    }

    public function register()
    {
        session(['visit' => 'yes']);
        session(['page' => 'register']);
        return view('guest.register');
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
    public function destroy($id)
    {
        //
    }
}
