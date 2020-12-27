<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $guarded = [];

    /**
    * Returns the model for this image.
    */
    public function imageable()
    {
      return $this->morphTo();
    }
}
