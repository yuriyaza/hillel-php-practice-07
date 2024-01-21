<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Comments')->insert([
            'id' => 1,
            'content' => Lorem::text(100),
            'post_id' => 3,
        ]);

        DB::table('Comments')->insert([
            'id' => 2,
            'content' => Lorem::text(100),
            'post_id' => 1,
        ]);

        DB::table('Comments')->insert([
            'id' => 3,
            'content' => Lorem::text(100),
            'post_id' => 2,
        ]);
    }
}
