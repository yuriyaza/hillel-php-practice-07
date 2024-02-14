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
        Category::factory(3)->create();
        Post::factory(10)->create();
        Comment::factory(20)->create();

//      Наповнення даними за допомогою Seeders
//      $this->call([
//          CategorySeeder::class,
//          PostSeeder::class,
//          CommentSeeder::class,
//      ]);
    }
}
