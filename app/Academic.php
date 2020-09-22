<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academic extends Model
{
	use SoftDeletes;
    protected $fillable=['name'];

    public function magazines(){
    	return $this->hasManyThrough('App\Magazine','App\Record');
    }

    public function faculty(){
    	return $this->hasMany('App\Faculty');
    }
    public function records(){
    	return $this->hasMany('App\Record');
    }
}
