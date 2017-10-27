<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Entry;

class BlogController extends Controller
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
        $pendings = Entry::simplePaginate(5);
        $posts = Post::simplePaginate(5);
     
        session(['page' => 'blog']);

        return view('admin.blog', compact(['posts', 'pendings']));
    }

    public function getPosts(){
        $posts = DB::table('posts')
        ->select('posts.id as post_id', 'users.name', 'users.id as user_id',
            'posts.created_at', 'posts.updated_at', 'title', 'body')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->paginate(10);

        return $posts;
    }

    public function show(Post $post)
    {
        $post->name = $post->user->name;
        $post->time = $post->created_at->toFormattedDateString(); 
        return $post;
    }

    public function search($string){

        $results = DB::table('posts')
        ->select('posts.id as post_id', 'users.name', 'users.id as user_id',
            'posts.created_at', 'posts.updated_at', 'title', 'body')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->where('title', 'like', "$string%")
        ->orWhere('body', 'like', "$string%")
        ->orWhere('name', 'like', "$string%")
        ->get();

        return $results;
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
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('message', 'Post has been removed!');

        return redirect()->back();
    }

    public function deleteAll(){
        Post::truncate();

        session()->flash('message', 'Deleted Successfully!');
        return redirect('/blog');
    }
}
