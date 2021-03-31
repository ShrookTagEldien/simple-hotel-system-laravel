<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_number' =>$this->faker->unique()->numberBetween(1000, 9999),
            'capacity' =>$this->faker->numberBetween(1,5),
            'status' =>$this->faker->randomElement(array('rented','available')),
            'price' =>$this->faker->numberBetween(1000,7000),
            'floor_number' =>$this->faker->unique()->numberBetween(1000, 9999),
            'manager_name' =>$this->faker->name,


        ];
    }
}
