<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
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

        DB::table('admins')->insert(array(
        0 =>
        array(
            'email' => 'admin@admin.com',
             'password' =>Hash::make('123456'),
             'name'=>'admin',
            'job_title'=>'admin',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ),
    ));
    User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' =>Hash::make('123456'),
            'avatar' =>'img.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'country'=>'-',
            'gender'=>'-',
            'phone'=>'-',
            'remember_token' =>NULL,
            'status'=>'active',
            'role'=> 'admin'  
    ]);

    }
}
