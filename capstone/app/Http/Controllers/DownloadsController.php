<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Stats;

class DownloadsController extends Controller
{
  
	public function download($file_name) {
		// $file_path = public_path('storage/files/'.$file_name);
		// return response()->download($file_path);
		// dd(storage_path("app/public/".$file_name));
		event(new Stats('download'));
		return response()->download(public_path("storage/files/".$file_name));
	}
}
