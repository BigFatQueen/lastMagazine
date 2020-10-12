<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
         $this->call(AcademicTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(FacultyTableSeeder::class);
        $this->call(ClassRoomTableSeeder::class);
         
         $this->call(UserTableSeeder::class);
       
        // $this->call(LevelTableSeeder::class);
        // $this->call(ClassRoomTableSeeder::class);
    }
}
