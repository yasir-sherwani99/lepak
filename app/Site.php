<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    public function locationn(){
    	return $this->belongsTo('App\Location', 'location_id');
    }
}
