<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // for reference
        // all into post model
        // $posts = Post::latest();
        // if($month = request('month')){
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if($year = request('year')){
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();

        //$archives = Post::archives();

        // dd($posts);
    	return view('posts.index', compact('posts'));
    }

    public function show(Post $posts){

    	return view('posts.show', compact('posts'));
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

    	// Post::create([
     //        'title' => request('title'),
     //        'body' => request('body'),
     //        'user_id' => auth()->id()
     //    ]);

    	//redirect to the home page
    	return redirect('/');
    }
}
