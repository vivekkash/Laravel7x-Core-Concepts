<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function postOne(){

        //return $this->hasOne(Post::class);

        //return $this->hasOne('App\Post', 'foreignKey','localKey');

        // if you dont follow laravel naming convention, you need to specific those parameters

        return $this->hasOne('App\Post');

    }


    public function postMany(){

        //return $this->hasOne(Post::class);

        //return $this->hasOne('App\Post', 'foreignKey','localKey');

        // if you dont follow laravel naming convention, you need to specific those parameters

        return $this->hasMany('App\Post');

    }

    public function roles(){

        return $this->belongsToMany('App\Role');
    }


    public function image(){

        return $this->morphOne('App\Image','imageable');
    }

     public function images(){

        return $this->morphMany('App\Image','imageable');
    }
}
