<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
    * Returns the user for this comment.
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
    * Returns the post for this comment.
    */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
