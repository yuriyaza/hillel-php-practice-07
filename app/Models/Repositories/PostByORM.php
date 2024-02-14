<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\PostInterface;
use App\Models\Post;

class PostByORM implements PostInterface
{
    public function getPostWithComments($postId)
    {
        $postAndComments = Post::with('comments')
            ->where('posts.id', '=', $postId)
            ->get()
            ->toArray();

        return $postAndComments;
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
