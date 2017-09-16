<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $table = 'employees';

    public function cityy(){
    	return $this->belongsTo('App\City', 'city_id');
    }
}
