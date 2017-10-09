<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Folder;
use App\File;

class FileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }

    public function index(){

    	session(['page' => 'file']);

    	return view('admin.file');
    }

    public function getFiles(){
        return File::filter(request(['folder']))
        ->paginate(5);
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

        // dd(request('file'));
        if(request('folders') == 'null'){
            $folder = 0;
        }
        else{
            $folder = request('folders');
        }

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
    		$path = $file->storeAs('public/files', $fileNameToStore.'.'.$extension);

    		File::create([
    			'uploader' => auth()->user()->name,
    			'filename' => $fileNameToStore,
    			'extension' => $extension,
    			'folder_id' => $folder
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
        //IF THE THE ERROR SAYS THERE IS NO FILE IN THAT DIRECTORY THEN THERE IS NO FUCKING FILE! BULLSHIT!
        $filname = $file->filename.'.'.$file->extension;
        // dd(public_path());
        $file_path = public_path("storage/files/{$filname}");
        if(unlink($file_path) && $file->delete()){
            session()->flash('message', 'File Deleted!');
            return redirect('/file');
        }
        else{
            session()->flash('message', 'Error!');
            return redirect('/file');
        }

    }

    public function change(Folder $folder){
        $files = File::where('folder_id', $folder->id)->get();
        foreach($files as $file){
            $file->folder_id = 0;
            $file->update();
        }
    }

}
