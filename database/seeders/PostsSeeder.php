<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            'id' => 1,
            'title' => 'Post about football',
            'content' => Lorem::text(100),
            'category_id' => 1,
        ]);

        DB::table('posts')->insert([
            'id' => 2,
            'title' => 'Post about basketball',
            'content' => Lorem::text(100),
            'category_id' => 1,
        ]);

        DB::table('posts')->insert([
            'id' => 3,
            'title' => 'Post about dog',
            'content' => Lorem::text(100),
            'category_id' => 2,
        ]);

        DB::table('posts')->insert([
            'id' => 4,
            'title' => 'Post about cat',
            'content' => Lorem::text(100),
            'category_id' => 2,
        ]);
    }
}
