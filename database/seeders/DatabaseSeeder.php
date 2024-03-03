<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//      Наповнення даними за допомогою Factories
        Category::factory(5)->create();
        Post::factory(5000)->create();
        Comment::factory(3000)->create();

//      Наповнення даними за допомогою Seeders
//      $this->call([
//          CategorySeeder::class,
//          PostSeeder::class,
//          CommentSeeder::class,
//      ]);
    }
}
