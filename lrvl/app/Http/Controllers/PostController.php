<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
    	return view('posts.index');
    }

    public function show(){
    	return view('posts.show');
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){
    	//dd(request()->all());
    	//dd(request('body');
    	//dd(request(['body', 'title']));

    	//create a new post using the request data
    	// $post = new Post;
    	// $post->title = request('title');
    	// $post->body = request('body');

    	// //save to the database
    	// $post->save();

    	//eloquent
    	Post::create(request(['title', 'body']));

    	//redirect to the home page
    	return redirect('/');
    }
}
