<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\CategoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryByQueryBuilder implements CategoryInterface
{

    public function getCategories()
    {
        $dataset = DB::table('categories')
            ->select('categories.*')
            ->get()
            ->toArray();

        $blogs = [];
        foreach ($dataset as $item) {
            $blogs [] = (array)$item;
        }

        return $blogs;
    }

    public function getCategoryWithPosts($categoryId)
    {
        $dataset = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select(
                'categories.*',
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

        $posts = [];
        foreach ($dataset as $item) {
            $posts [] = [
                'id' => $item->post_id,
                'title' => $item->post_title,
                'content' => $item->post_content,
                'created_at' => $item->post_created_at,
                'updated_at' => $item->post_updated_at,
                'category_id' => $item->post_category_id,
            ];
        }

        $categoryAndPosts [] = [
            'id' => $dataset[0]->id,
            'name' => $dataset[0]->name,
            'description' => $dataset[0]->description,
            'created_at' => $dataset[0]->created_at,
            'updated_at' => $dataset[0]->updated_at,
            'posts' => $posts,
        ];

        return $categoryAndPosts;
    }

    public function addCategory($categoryName, $categoryDescription)
    {
        $result = DB::table('categories')
            ->insert([
                'name' => $categoryName,
                'description' => $categoryDescription
            ]);

        return $result;
    }
}
