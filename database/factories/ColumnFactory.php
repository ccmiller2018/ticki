<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColumnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $faker->word,
            'order' => 1,
        ];
    }
}
