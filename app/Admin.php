<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admins';
    
    public function cityy(){
    	return $this->belongsTo('App\City', 'city_id');
    }
}
