<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Entry;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show', 'destroy']);
    }

    public function index(){

        $posts = Post::latest()
            ->filter(request(['month', 'year'])) //filter method in post model
            ->paginate(5);

        // $archives = Post::archives(); <-- into service provider for every sidebar

    	return view('posts.index', compact('posts'));
    } 

    public function show(Post $post){
    	return view('posts.show', compact('post'));
    }
 
    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){
    	// $post = new Post;
    	// $post->title = request('title');
    	// $post->body = request('body');

    	// $post->save(); 
        // dd(request()->all());

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        Entry::create([
         'user_id' => request('id'),
         'title' => request('title'),
         'body' => request('body')
        ]);

        session()->flash('message', 'Your post will be validated for approval');

    	return redirect('/');
    }

    public function update(Request $request, Post $post){

        $post->title = request('title');
        $post->body = request('body');

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish($post);

        session()->flash('message', 'Post has been successfully updated!');
        return redirect('/posts/'.$post->id);

    }

    public function destroy(Post $post){
        
        $post->delete();

        session()->flash('message', 'Post has been removed!');
        return redirect()->back();
    }
}
