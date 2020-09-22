<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable=['user_id','nrc','fatherName','motherName','phone','address'];
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function records(){
    	return $this->hasMany('App\Record');
    }

    
}
