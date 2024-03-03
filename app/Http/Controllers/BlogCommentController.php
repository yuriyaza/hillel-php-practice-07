<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CommentInterface;
use Illuminate\Http\Request;

class BlogCommentController
{
    public function addComment(Request $request, CommentInterface $blogComment)
    {
        $postId = $request->postId;
        $comment = $request->comment;

        dump(
            $blogComment->addComment($postId, $comment)
        );
    }

    public function deleteComment(Request $request, CommentInterface $blogComment)
    {
        $id = $request->get('id');

        dump(
            $blogComment->deleteComment($id)
        );
    }
}
