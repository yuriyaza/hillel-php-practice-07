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

        $category = [
            'id' => $dataset[0]->id,
            'name' => $dataset[0]->name,
            'description' => $dataset[0]->description,
            'created_at' => $dataset[0]->created_at,
            'updated_at' => $dataset[0]->updated_at,
            'posts' => [],
        ];

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

        $categoryWithPosts = $category;
        $categoryWithPosts['posts'] = $posts;

        return $categoryWithPosts;
    }

    public function getCategoriesWithComments()
    {
        $dataset = DB::table('categories')
            ->leftJoin('posts', 'posts.category_id', '=', 'categories.id')
            ->leftJoin('comments', 'comments.post_id', '=', 'posts.id')
            ->select(
                'categories.*',
                'comments.id as comment_id',
                'comments.content as comment_content',
                'comments.created_at as comment_created_at',
                'comments.updated_at as comment_updated_at',
                'comments.post_id as comment_post_id',
            )
            ->get()
            ->toArray();

        $categories = [];
        $comments = [];
        $categoriesWithComments = [];

        foreach ($dataset as $item) {
            $category = [
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'comments' => [],
            ];

            if (!in_array($category, $categories)) {
                $categories[] = $category;
            }

            $comment = [
                'id' => $item->comment_id,
                'content' => $item->comment_content,
                'created_at' => $item->comment_created_at,
                'updated_at' => $item->comment_updated_at,
                'post_id' => $item->comment_post_id,
                'category_id' => $item->id,
            ];

            if ($comment['id'] <> null) {
                $comments[] = $comment;
            }
        }

        foreach ($categories as $category) {
            foreach ($comments as $comment) {
                if ($category['id'] === $comment['category_id']) {
                    $category['comments'][] = $comment;
                }
            }
            $categoriesWithComments[] = $category;
        }

        return $categoriesWithComments;
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
