<?php

namespace App;

class File extends Model
{

	public function folder(){
		return $this->belongsTo(File::class);
	}

}
