<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\BlogCommentInterface;
use Illuminate\Http\Request;

class BlogCommentController
{
    public function deleteComment(BlogCommentInterface $blogComment, Request $request)
    {
        $id = $request->get('id');

        dump(
            $blogComment->deleteComment($id)
        );
    }
}
