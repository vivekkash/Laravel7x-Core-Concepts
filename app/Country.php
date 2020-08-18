<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //


    public function posts(){

    	//return $this->hasManyThrough('target_table','common_table','common_target_table_fk','current_table_fk','localkey','common_table_key');


    	return $this->hasManyThrough('App\Post','App\User');

    }


    public function post(){

    	//return $this->hasManyThrough('target_table','common_table','common_target_table_fk','current_table_fk','localkey','common_table_key');


    	return $this->hasOneThrough('App\Post','App\User');

    }


}
