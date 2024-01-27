<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\BlogPostInterface;
use Illuminate\Http\Request;

class BlogPostController
{
    public function getPosts(BlogPostInterface $blogPost, $categoryId, $postId)
    {
        dump(
            $blogPost->getPosts($categoryId, $postId)
        );
    }

    public function updatePost(BlogPostInterface $blogPost, Request $request)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');

        dump(
            $blogPost->updatePost($id, $title, $content)
        );
    }
}
