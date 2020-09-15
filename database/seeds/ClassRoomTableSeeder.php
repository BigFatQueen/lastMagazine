<?php

use Illuminate\Database\Seeder;
use App\Classroom;

class ClassRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Classroom::create([
         	'name'=>'A',
         	'level_id'=>1
         ]);

          Classroom::create([
         	'name'=>'A',
         	'level_id'=>2
         ]);

           Classroom::create([
         	'name'=>'A',
         	'level_id'=>3
         ]);

           
    }
}
