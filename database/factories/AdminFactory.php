<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adminName'=>'admin',
            'email'=>'thandipawandeep@gmail.com',
            'password'=>bcrypt('9463661781p'),
            'adminPin'=>bcrypt('2908'),
            'phone_number'=>$this->faker->phoneNumber,
        ];
    }
}
