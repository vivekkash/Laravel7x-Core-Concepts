<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Softdeletes;

class Post extends Model
{
    use Searchable;
    use Softdeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function searchableAs()
    {
        return 'posts_index';
    }


    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function image(){

    	return $this->morphOne('App\Image','imageable');
    }

    public function images(){

    	return $this->morphMany('App\Image','imageable');
    }
}
