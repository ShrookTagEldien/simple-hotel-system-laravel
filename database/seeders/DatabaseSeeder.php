<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

    	foreach (range(1,25) as $index) {

            DB::table('managers')->insert([
                
                'email' => $faker->email,
                'username' => $faker->username,
                'password' =>Hash::make('12345678'),
                'avatar' => 'img.png',
                'NationalID' => $faker->phoneNumber
            ]);

            /********************Receptionists****************************/
            DB::table('receptionists')->insert([
                
                    'email' => $faker->email,
                    'username' => $faker->username,
                    'avatar' => 'img.png',
                    'NationalID' => $faker->phoneNumber,
                    'password' =>Hash::make('12345678'),
                ]);


                DB::table('floors')->insert([
                    'id' =>$faker->unique()->numberBetween(1000, 9999),
                    'name' =>strtoupper($faker->lexify('???')),

                    
                ]);



            }    
     
    
    }
    
}   
    
