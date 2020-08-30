<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'status', 'image'
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
