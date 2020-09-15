<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
     protected $fillable=['title','photo','postDate','description','article','user_id','status'];

     public function user(){
     	return $this->hasOne('App\User');
     }
     
}
