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
            'code' => $this->faker->slug(6),
            'preview_text' => $this->faker->text(50),
            'detail_text' => $this->faker->text(),
            'thumbnail' => $this->faker->image($_SERVER['DOCUMENT_ROOT'] . 'storage/app/public/posts', 640, 480, '', false),
        ];
    }
}
