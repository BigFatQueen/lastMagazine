<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=['superadmin','manager','coordinator','student','guest'];
        foreach ($roles as $value) {
        	Role::create(['name'=>$value]);
        }
    }
}
