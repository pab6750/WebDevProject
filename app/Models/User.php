<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Returns the image for this user.
    */
    public function image()
    {
      return $this->morphOne('App\Models\Image', 'imageable');
    }

    /**
    * Returns the posts for this user.
    */
    public function posts()
    {
      return $this->hasMany('App\Models\Post');
    }

    /**
    * Returns the comments for this user.
    */
    public function comments()
    {
      return $this->hasMany('App\Models\Comment');
    }

    /**
    * Returns the user page for this user.
    */
    public function user_page()
    {
      return $this->hasOne('App\Models\UserPage');
    }
}
