<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Sport',
            'description' => 'Sports activities',
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Pet',
            'description' => 'Care of pets',
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Home',
            'description' => 'All about your home',
        ]);
    }
}
