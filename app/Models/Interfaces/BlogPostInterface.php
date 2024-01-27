<?php

namespace App\Models\Interfaces;

interface BlogPostInterface
{
    public function getPosts($categoryId, $postId);
    public function updatePost($id, $title, $content);
}
