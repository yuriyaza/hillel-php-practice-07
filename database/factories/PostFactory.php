<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'content' => fake()->text(200),
            'category_id' => fake()->numberBetween(1, Category::count()),
        ];
    }
}
