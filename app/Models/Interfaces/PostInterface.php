<?php

namespace App\Models\Interfaces;

interface PostInterface
{
    public function getPostWithComments($postId);
    public function updatePost($id, $title, $content);
}
