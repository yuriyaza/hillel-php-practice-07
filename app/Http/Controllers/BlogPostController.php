<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController
{
    public function getPosts($categoryId, $postId): void
    {
        $result = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->select(
                'posts.id as post_id',
                'posts.title as post_title',
                'posts.content as post_content',
                'posts.created_at as post_created',
                'posts.updated_at as post_updated',
                'comments.id as comment_id',
                'comments.content as comment_content',
                'comments.created_at as comment_created',
                'comments.updated_at as comment_updated'
            )
            ->where('categories.id', '=', $categoryId)
            ->where('posts.id', '=', $postId)
            ->get();

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
