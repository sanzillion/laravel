<?php

namespace App;
use Carbon\Carbon;

class Post extends Model
{
    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function addComment($body, $user){
    	
    	// $this->comments()->create(compact('body'), $user);

        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
            'user_id' => $user
        ]);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters){
        
        if(array_key_exists('month', $filters)){
            if($month = $filters['month']){
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }
        if (array_key_exists('year', $filters)) {
            if($year = $filters['year']){
                $query->whereyear('created_at', $year);
            }
        }

        if(array_key_exists('search', $filters)) {
            if($string = $filters['search']){
                $query->where('title', 'like', "$string%")
                ->orWhere('body', 'like', "$string%");
            }
        }

    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
