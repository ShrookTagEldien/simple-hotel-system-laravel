<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('roles')->insert(array (
        0 =>
        array (
            'id' => 1,
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ),
        1 =>
         array (
            'id' => 2,
            'name' => 'manager',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ),
        2 =>
         array (
            'id' => 3,
            'name' => 'recep',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ),
        3 =>
         array (
            'id' => 4,
            'name' => 'client',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ),        
                        
        

    ));
}
}