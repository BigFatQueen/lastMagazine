<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use SoftDeletes;
    protected $fillable=['student_id','classroom_id','academic_id','faculty_id','rollno'];

    public function student(){
    	return $this->belongsTo('App\Student');
    }
    public function classroom(){
    	return $this->belongsTo('App\Classroom');
    }
    public function faculty(){
    	return $this->belongsTo('App\Faculty');
    }
    public function academic(){
    	return $this->belongsTo('App\Academic');
    }

    public function magazines(){
        return $this->hasMany('App\Magazine');
    }
}
