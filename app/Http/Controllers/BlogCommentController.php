<?php

namespace App\Http\Controllers;

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

        $result = DB::table('comments')
            ->delete($id);

        dump($result);
    }
}
