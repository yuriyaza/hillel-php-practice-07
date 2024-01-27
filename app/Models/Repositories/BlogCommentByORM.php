<?php

namespace App\Models\Repositories;

use App\Models\Comment;
use App\Models\Interfaces\BlogCommentInterface;

class BlogCommentByORM implements BlogCommentInterface
{
    public function deleteComment($id)
    {
        if (!$id) {
            dd('ID is not specified');
        }

        $result = Comment::where('id', '=', $id)
            ->delete();

        return $result;
    }
}
