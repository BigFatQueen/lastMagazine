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

     public function magazines(){
	   	return $this->hasOneThrough('App\Magazine','App\Record');
	   }

      protected static function boot() 
    {
       parent::boot();

       static::deleting(function($student) {

        dd($student->magazines()->get());
         foreach ($student->magazines()->get() as $ms) {
                // $ms->delete();
             }

         // foreach ($academic->records()->get() as $records) {

            
         //    foreach ($records->student()->get() as  $student) {
                
                
         //        $student->user()->delete();
         //    }
         //    $records->student()->delete();
         //    $records->delete();
         // }
        
        // dd($faculty->students()->get());
         // foreach ($faculty->records()->student()->get() as $ss) {
         //     dd($ss);
         //      // $ms->delete();
         // }
         // foreach ($faculty->records()->student()->user()->get() as $us) {
         //      $us->delete();
         // }
       });
    }

    
}
