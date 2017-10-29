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

	public function downloadables($file){
		return response()->download(public_path("files/".$file));
	}

	public function activitylogs(){
		//RECORD DOWNLOAD EXCEL FILE

		// output headers so that the file is downloaded rather than displayed
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=ActivityLogs.csv');

		//set headings
		$heading = [];
		$heading[] = "ID";
		$heading[] = "User";
		$heading[] = "Type";
		$heading[] = "Action";
		$heading[] = "Description";
		$heading[] = "Created";
		$heading[] = "Updated";

		//open file to write
		$fp = fopen('php://output', 'w');

		//write headings first
		fputcsv($fp, $heading);

		//fetch assoc array
		$results = \App\Tracker::all()->toArray();
		// dd($results);
		//put every row into the file
		foreach ($results as $fields) {
				fputcsv($fp, $fields);
		}

		//close the opened file
		fclose($fp);
	}
}
