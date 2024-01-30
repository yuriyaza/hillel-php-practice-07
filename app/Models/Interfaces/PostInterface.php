<?php

namespace App\Models\Interfaces;

interface PostInterface
{
    public function getPosts($categoryId, $postId);
    public function updatePost($id, $title, $content);
}
