<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announce extends Model
{
    use SoftDeletes;
    protected $fillable=['title','decsription','deadline','editLDate'];
}
