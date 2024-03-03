<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\PostInterface;
use Illuminate\Http\Request;

class BlogPostController
{
    public function getPostWithComments($categoryId, $postId, PostInterface $blogPost)
    {
        dump(
            $blogPost->getPostWithComments($categoryId, $postId)
        );
    }

    public function updatePost(Request $request, PostInterface $blogPost)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');

        dump(
            $blogPost->updatePost($id, $title, $content)
        );
    }
}
