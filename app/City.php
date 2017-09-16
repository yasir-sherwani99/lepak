<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function employeess(){
    	return $this->hasMany('App\Employee');
    }

    public function adminn(){
    	return $this->hasMany('App\Admin');
    }
}
