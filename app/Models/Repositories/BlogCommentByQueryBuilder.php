<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\BlogCommentInterface;
use Illuminate\Support\Facades\DB;

class BlogCommentByQueryBuilder implements BlogCommentInterface
{
    public function deleteComment($id)
    {
        if (!$id) {
            dd('ID is not specified');
        }

        $result = DB::table('comments')
            ->delete($id);

        return $result;
    }
}
