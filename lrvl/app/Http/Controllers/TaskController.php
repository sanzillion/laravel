<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
	public function index(){

		$task = Task::all();
		return view('test', compact('task'));

	}

	public function show(Task $task){
		
		//$task = Task::find($id); //fetch data from model
		return view('test.show', compact('task')); // pass to the view

	}
}
