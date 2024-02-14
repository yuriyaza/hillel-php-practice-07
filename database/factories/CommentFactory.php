<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => fake()->text(100),
            'post_id' => fake()->numberBetween(1, Post::count()),
        ];
    }
}
