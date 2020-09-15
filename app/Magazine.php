<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Magazine extends Model
{
    //
    use SoftDeletes;
     protected $fillable=['title','photo','postDate','description','article','record_id','announce_id','comment_status','selected_status'];

     public function record(){
     	return $this->belongsTo('App\Record');
     }

     public function comments(){
     	return $this->hasMany('App\Comment');
     }

}
