<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
	use SoftDeletes;
    protected $fillable=['name','level_id'];
    public function level(){
    	return $this->belongsTo('App\Level');
    }
}
