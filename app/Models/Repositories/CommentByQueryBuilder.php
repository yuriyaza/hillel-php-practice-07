<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\CommentInterface;
use Illuminate\Support\Facades\DB;

class CommentByQueryBuilder implements CommentInterface
{
    public function deleteComment($id)
    {
        $result = DB::table('comments')
            ->delete($id);

        return $result;
    }
}
