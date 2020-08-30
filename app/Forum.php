<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'status', 'image'
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
