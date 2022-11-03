<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(),
            'level' => $this->faker->numberBetween(1, 3),
            'margin_left' => $this->faker->numberBetween(1),
            'margin_right' => $this->faker->numberBetween(2)
        ];
    }
}
