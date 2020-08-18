<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    
    public function imageable(){

    	return $this->morphTo();

    }
}
