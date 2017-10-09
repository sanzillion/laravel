<?php

namespace App;

class File extends Model
{

	public function folder(){
		return $this->belongsTo(File::class);
	}
    
    public function scopeFilter($query, $filters){
        
        if(array_key_exists('folder', $filters)){
            if($folder = $filters['folder']){
                $query->where('folder_id', $folder);
            }
        }

    }

}
