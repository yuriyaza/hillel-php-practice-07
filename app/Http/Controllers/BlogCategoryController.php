<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BlogCategoryController
{
    public function getCategories($categoryId): void
    {
        $result = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select(
                'categories.id as category_id',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.created_at as category_created',
                'categories.updated_at as category_updated',
                'posts.id as post_id',
                'posts.title as post_title',
                'posts.content as post_content',
                'posts.created_at as post_created',
                'posts.updated_at as post_updated'
            )
            ->where('categories.id', '=', $categoryId)
            ->get();

        dump($result);
    }

    public function addCategory(Request $request): void
    {
        $newCategoryName = $request->get('name');
        $newCategoryDescription = $request->get('description');

        $result = DB::table('categories')
            ->insert([
                'name' => $newCategoryName,
                'description' => $newCategoryDescription
            ]);

        dump($result);
    }
}
