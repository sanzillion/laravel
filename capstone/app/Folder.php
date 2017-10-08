<?php

namespace App;

class Folder extends Model
{
    public function files(){
    	return $this->hasMany(File::class);
    }
}
