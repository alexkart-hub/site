<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'code' => '',
            'preview_text' => $this->faker->text(50),
            'detail_text' => $this->faker->text(),
            'thumbnail' => $this->faker->image('public/storage/posts', 640, 480, '', false),
        ];
    }
}
