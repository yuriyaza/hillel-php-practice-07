<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 1,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 1,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 1,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 1,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 2,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 2,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 3,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 3,
        ]);

        DB::table('comments')->insert([
            'content' => Lorem::text(100),
            'post_id' => 3,
        ]);
    }
}
