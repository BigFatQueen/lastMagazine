<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academic extends Model
{
	use SoftDeletes;
    protected $fillable=['name'];

    public function magazines(){
    	return $this->hasManyThrough('App\Magazine','App\Record');
    }

    public function faculty(){
    	return $this->hasMany('App\Faculty');
    }
    public function records(){
    	return $this->hasMany('App\Record');
    }

     protected static function boot() 
    {
       parent::boot();

       static::deleting(function($academic) {

        
         foreach ($academic->magazines()->get() as $ms) {
                $ms->delete();
             }

         foreach ($academic->records()->get() as $records) {

            
            foreach ($records->student()->get() as  $student) {
                
                
                $student->user()->delete();
            }
            $records->student()->delete();
            $records->delete();
         }
        
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
