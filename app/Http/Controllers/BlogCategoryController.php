<?php

namespace App\Http\Controllers;

use App\Helpers\CreateCategoryList;
use App\Models\Category;
use App\Repositories\BlogCategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController
{
    public function getCategories($categoryId, CreateCategoryList $createCategoryList): void
    {
        // Code with Query Builder
        $dataset = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select(
                'categories.id as category_id',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.created_at as category_created_at',
                'categories.updated_at as category_updated_at',

                'posts.id as post_id',
                'posts.title as post_title',
                'posts.content as post_content',
                'posts.created_at as post_created_at',
                'posts.updated_at as post_updated_at',
                'posts.category_id as post_category_id',
            )
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();

        $result = $createCategoryList
            ->setSourceDataset($dataset)
            ->setMainCategoryPrefix('category')
            ->setSubCategoryPrefix('post')
            ->execute();

        dump($result);

        // Code with ORM
        $resultOrm = Category::with('post')
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();
        dump($resultOrm);
    }

    public function addCategory(Request $request): void
    {
        $newCategoryName = $request->get('name');
        $newCategoryDescription = $request->get('description');

        // Query builde
//        $result = DB::table('categories')
//            ->insert([
//                'name' => $newCategoryName,
//                'description' => $newCategoryDescription
//            ]);

        // ORM
        $category = new Category;
        $category->name = $newCategoryName;
        $category->description = $newCategoryDescription;
        $result = $category->save();


        dump($result);
    }
}
