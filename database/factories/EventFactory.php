<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->jobTitle,
            'description'=>$this->faker->text,
            'time'=>$this->faker->time,
            'venue'=>$this->faker->locale,
            'organized_by'=>$this->faker->name ,
            'contact'=>$this->faker->phoneNumber
        ];
    }
}
