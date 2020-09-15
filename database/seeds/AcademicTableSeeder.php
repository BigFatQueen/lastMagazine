<?php

use Illuminate\Database\Seeder;
use App\Academic;

class AcademicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academics=['2017','2018','2019','2020','2021'];
        foreach ($academics as $value) {
        	Academic::create(['name'=>$value]);
        }
    }
}
