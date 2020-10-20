<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use SoftDeletes;
    // protected $fillable=['user_id','photo','nrc','education','phone','address'];
    protected $fillable=['user_id','nrc','education','phone','address'];

    public function record(){
    	return $this->belongsTo('App\Record');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
