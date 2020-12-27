<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
    * Returns the image for this post.
    */
    public function image()
    {
      return $this->morphOne('App\Models\Image', 'imageable');
    }

    /**
    * Returns the user for this post.
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
    * Returns the tags for this post.
    */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    /**
    * Returns the comments for this post.
    */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
