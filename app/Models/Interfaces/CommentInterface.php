<?php

namespace App\Models\Interfaces;

interface CommentInterface
{
    public function addComment($postId, $comment);

    public function deleteComment($id);
}
