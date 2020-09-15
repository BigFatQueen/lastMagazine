<?php

use Illuminate\Database\Seeder;
use App\Faculty;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faculties=['Business','Web','Network'];
        foreach ($faculties as $value) {
        	Faculty::create(['name'=>$value]);
        }
    }
}
