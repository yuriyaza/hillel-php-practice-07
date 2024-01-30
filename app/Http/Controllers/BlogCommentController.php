<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CommentInterface;
use Illuminate\Http\Request;

class BlogCommentController
{
    public function deleteComment(CommentInterface $blogComment, Request $request)
    {
        $id = $request->get('id');

        dump(
            $blogComment->deleteComment($id)
        );
    }
}
