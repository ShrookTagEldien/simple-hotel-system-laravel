<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 25) as $index) {
            DB::table('floors')->insert([
            'floorId' =>$faker->unique()->numberBetween(1000, 9999),
            'name' =>strtoupper($faker->lexify('???')),
            'Manager'=>'Fatma',
            'email'=>$faker->email,
        ]);
        }
    }
}
