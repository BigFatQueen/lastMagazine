<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinator extends Model
{
    use SoftDeletes;
     // protected $fillable=['user_id','faculty_id','photo','nrc','education','phone','address'];
     protected $fillable=['user_id','faculty_id','nrc','education','phone','address'];

     public function user(){
    	return $this->belongsTo('App\User');
    }

    public function faculty(){
    	return $this->belongsTo('App\Faculty');
    }
}
