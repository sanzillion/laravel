<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;

class FolderController extends Controller
{
    public function create(){

    	$this->validate(request(), [
    		'name' => 'required|min:1|alpha_num|unique:folders',
    	]);

    	Folder::create([
    		'name' => request('name')
    	]);

        session()->flash('message', 'Container Created!');

        return redirect('/file');
    }

    public function get(){
    	
		return 	$folders = Folder::paginate(12);
    }

    public function destroy(Folder $folder){
        $folder->delete();

    }

    public function allFolders(){
        return  $folders = Folder::all();
    }
}
