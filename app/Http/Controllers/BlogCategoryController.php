<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BlogCategoryController
{
    public function getCategories($categoryId): void
    {
        // Code with Query Builder
        $result = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select('categories.*', 'posts.title as post')
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();
        dump('Query Builder', $result);

        // Code with ORM
        $resultOrm = Category::with('post')
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();
        dump('ORM', $resultOrm);
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
