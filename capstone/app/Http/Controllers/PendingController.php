<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use App\Post;

class PendingController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Entry $post)
    {
        //transfer from pending to post
        Post::create([
         'user_id' => $post->user_id,
         'title' => $post->title,
         'body' => $post->body
        ]);

        //delete from pending_posts
        $post->delete();

        session()->flash('message', 'Blog post approved!');

        return redirect('/blog');
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
    public function show(Entry $post)
    {   
        $post->name = $post->user->name;
        $post->time = $post->created_at->toFormattedDateString(); 
        return $post;
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
    public function destroy(Entry $post)
    {
        $post->delete();
       
        session()->flash('message', 'Post request deleted!');

        return redirect('/blog');

    }
}
