<?php

namespace App\Models\Interfaces;

interface PostInterface
{
    public function getPost($categoryId, $postId);
    public function updatePost($id, $title, $content);
}
