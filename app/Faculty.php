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

    public function coordinators(){
   	return $this->hasMany('App\Coordinator');
   }

   public function magazines(){
   	return $this->hasOneThrough('App\Magazine','App\Record');
   }

   public function students(){
   	return $this->hasOneThrough('App\Record', 'App\Student');
   }



   protected static function boot() 
	{
	   parent::boot();

	   static::deleting(function($faculty) {

	   	foreach ($faculty->coordinators()->get() as $cs) {
		        $cs->delete();
		     }
	   	 foreach ($faculty->magazines()->get() as $ms) {
		        $ms->delete();
		     }

	     foreach ($faculty->records()->get() as $records) {

	     	
	     	foreach ($records->student()->get() as  $student) {
	     		
	     		
	     		$student->user()->delete();
	     	}
	     	$records->student()->delete();
	        $records->delete();
	     }
	    
	   	// dd($faculty->students()->get());
	     // foreach ($faculty->records()->student()->get() as $ss) {
	     // 	dd($ss);
	     // 	 // $ms->delete();
	     // }
	     // foreach ($faculty->records()->student()->user()->get() as $us) {
	     // 	 $us->delete();
	     // }
	   });
	}
}





