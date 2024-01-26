<?php

namespace App\Http\Controllers;

use App\Helpers\CreateCategoryList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController
{
    public function getPosts($categoryId, $postId, CreateCategoryList $createCategoryList): void
    {
        // Code with Query Builder
        $dataset = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->select(
                'posts.id as post_id',
                'posts.title as post_title',
                'posts.content as post_content',
                'posts.created_at as post_created_at',
                'posts.updated_at as post_updated_at',
                'posts.category_id as post_category_id',

                'comments.id as comment_id',
                'comments.content as comment_content',
                'comments.created_at as comment_created_at',
                'comments.updated_at as comment_updated_at',
                'comments.post_id as comment_post_id',
            )
            ->where('categories.id', '=', $categoryId)
            ->where('posts.id', '=', $postId)
            ->get()
            ->toArray();

        $result = $createCategoryList
            ->setSourceDataset($dataset)
            ->setMainCategoryPrefix('post')
            ->setSubCategoryPrefix('comment')
            ->execute();

        dump($result);
    }

    public function updatePost(Request $request): void
    {
        $id = $request->get('id');
        $newTitle = $request->get('title');
        $newContent = $request->get('content');

        $result = DB::table('posts')
            ->where('id', '=', $id)
            ->update([
                'title' => $newTitle,
                'content' => $newContent
            ]);

        dump($result);
    }
}
