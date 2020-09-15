<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;
	protected  $fillable=['magazine_id','user_id','comment'];


	public function user(){
		return $this->belongsTo('App\User',);
	}
    
    public function magazine(){
		return $this->belongsTo('App\Magazine');
	}
}
