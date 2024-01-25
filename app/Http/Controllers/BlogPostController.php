<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController
{
    public function getPosts($categoryId, $postId): void
    {
        // Code with Query Builder
        $result = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->select('posts.*', 'comments.content as comment',)
            ->where('categories.id', '=', $categoryId)
            ->where('posts.id', '=', $postId)
            ->get()
            ->toArray();

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
