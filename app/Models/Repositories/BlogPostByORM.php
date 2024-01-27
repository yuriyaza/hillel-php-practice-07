<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\BlogPostInterface;
use App\Models\Post;

class BlogPostByORM implements BlogPostInterface
{
    public function getPosts($categoryId, $postId)
    {
        $result = Post::with('comment')
            ->where('category_id', '=', $categoryId)
            ->where('posts.id', '=', $postId)
            ->get()
            ->toArray();

        return $result;
    }

    public function updatePost($id, $title, $content)
    {
        $result = Post::where('id', '=', $id)
            ->update([
                'title' => $title,
                'content' => $content
            ]);

        return $result;
    }
}
