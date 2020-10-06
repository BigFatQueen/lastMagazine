<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
	use SoftDeletes;
   protected $fillable=['name','logo'];

   public function records(){
   	return $this->hasMany('App\Record');
   }

   public function magazines(){
   	return $this->hasOneThrough('App\Magazine','App\Record');
   }
}





