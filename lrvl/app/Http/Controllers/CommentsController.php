<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $posts){
    	// dd(request('body'));
    	$this->validate(request(), ['body' => 'required|min:2']);
    	$posts->addComment(request('body'));

    	return back();
    }
}
