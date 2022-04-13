<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'subject' => $this->faker->realText(40),
            'body' => $this->faker->realText(200, true),
            'file' => '/storage/application_files/placeholder.jpg',
            'user_id' => rand(2, 4)
        ];
    }
}
