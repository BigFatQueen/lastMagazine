<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\StudentResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        foreach ($this->user->roles as $key => $value) {
            $name=$value->name;
       
       
         return  array([
            'comment'=>$this->comment,
            'commentDate'=>$this->created_at,
            'user_id'=>$this->user->id,
            'name'=>$this->user->name,
           
           $this->mergeWhen(($name == 'student'), [
            'student' => $this->user->student
            
        ]),

           $this->mergeWhen(($name == 'coordinator'), [
            'coordinator' => $this->user->coordinator
            
        ]),
            

          
           
        ]);
        }
    }
}
