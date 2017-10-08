<?php

namespace App;

class Entry extends Model
{
    protected $table = 'pending_posts';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
