<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCommentController
{
    public function deleteComment(Request $request): void
    {
        $id = $request->get('id');

        if (!$id) {
            dd('ID is not specified');
        }

        //Querybuilder
//        $result = DB::table('comments')
//            ->delete($id);

        // ORM
        $result = Comment::where('id', '=', $id)
            ->delete();

        dump($result);
    }
}
