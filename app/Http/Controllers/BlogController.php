<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BlogController
{
    public function getBlog(): void
    {
        $result = DB::table('categories')
            ->select(
                'id as category_id',
                'name as category_name',
                'description as category_description',
                'created_at as category_created',
                'updated_at as category_updated'
            )
            ->get();

        dump($result);
    }
}
