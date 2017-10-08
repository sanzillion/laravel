<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Folder;
use App\File;
use Illuminate\Support\Facades\File as LaraFile;

class FileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }

    public function index(){
     //    $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
    	// dd($storagePath);
    	session(['page' => 'file']);

    	return view('admin.file', compact(['storagePath']));
    }

    public function getFiles(){
        return File::paginate(5);
    }

    public function edit(File $file){
    	return $file;
    }

    public function search($string){

        $results = File::where('uploader', 'like', "$string%")
        ->orWhere('filename', 'like', "$string%")
        ->orWhere('extension', 'like', "$string%")->paginate(5);

        return $results;
    }

    public function create(){

		foreach(request('file') as $key => $val){
			$rules['file.'.$key] = 'required|max:2048';
		}

    	$this->validate(request(), $rules);

    	foreach(request('file') as $file){
    		//file name with extension
    		$filenameWithExt = $file->getClientOriginalName();
    		//get filename
    		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    		//get just ext
    		$extension = $file->getClientOriginalExtension();
    		//file name to store
    		$fileNameToStore = $filename.'_'.time();
    		//upload file
    		$path = $file->storeAs('public', $fileNameToStore);

    		File::create([
    			'uploader' => auth()->user()->name,
    			'filename' => $fileNameToStore,
    			'extension' => $extension,
    			'folder_id' => request('folders')
    		]);
    	}

        if($path){
    		session()->flash('message', 'File/Files Uploaded!');

        	return redirect('/file');
        }
        else{
            session()->flash('message', 'Looks like something went wrong!');

            return redirect('/file');
        }
    }

    public function destroy(File $file){
        // dd(LaraFile::size(public_path().$file->filename.'.'.$file->extension));

        dd(Storage::disk('public')->size('cpstn_1507452645.jpg'));
        if(Storage::disk('public')->exists('cpstn_1507452645.jpg')){
            dd("exists");
            // $file->delete();

            // session()->flash('message', 'File Deleted!');

            // return redirect('/file');
        }
        else{
            dd("error");
            // session()->flash('message', 'Error!');

            // return redirect('/file');
        } 
    }

}
