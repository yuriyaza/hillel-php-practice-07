<?php

namespace App\Models\Interfaces;

interface PostInterface
{
    public function getPostWithComments($categoryId, $postId);
    public function updatePost($id, $title, $content);
}
