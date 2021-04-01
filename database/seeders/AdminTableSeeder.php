<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admins')->insert(array (
        0 =>
        array (
            'email' => 'admin@admin.com',
             'password' =>Hash::make('123456'),
             'name'=>'admin',
             'job_title'=>'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ),
       

    ));
    }
}
