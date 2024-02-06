<?php

namespace App\Models\Repositories;

use App\Models\Comment;
use App\Models\Interfaces\CommentInterface;

class CommentByORM implements CommentInterface
{
    public function deleteComment($id)
    {
        $result = Comment::where('id', '=', $id)
            ->delete();

        return $result;
    }
}
