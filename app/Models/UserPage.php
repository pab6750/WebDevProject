<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPage extends Model
{
    use HasFactory;

    /**
    * Returns the user for this user page.
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
