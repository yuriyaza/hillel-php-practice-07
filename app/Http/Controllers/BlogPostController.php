<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\PostInterface;
use Illuminate\Http\Request;

class BlogPostController
{
    public function getPostWithComments(PostInterface $blogPost, $categoryId, $postId)
    {
        dump(
            $blogPost->getPostWithComments($categoryId, $postId)
        );
    }

    public function updatePost(PostInterface $blogPost, Request $request)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');

        dump(
            $blogPost->updatePost($id, $title, $content)
        );
    }
}
