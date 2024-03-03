<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\CommentInterface;
use Illuminate\Support\Facades\DB;

class CommentByQueryBuilder implements CommentInterface
{
    public function addComment($postId, $comment)
    {
        try {
            DB::beginTransaction();

            DB::table('comments')
                ->insert([
                    'post_id' => $postId,
                    'content' => $comment,
                ]);

            DB::table('posts')
                ->where('id', '=', $postId)
                ->update([
                    'updated_at' => now(),
                ]);

            $categoryID = DB::table('posts')
                ->where('id', '=', $postId)
                ->value('category_id');

            DB::table('categories')
                ->where('id', '=', $categoryID)
                ->update([
                    'updated_at' => now(),
                ]);

            DB::commit();
            return true;

        } catch (\Error $error) {
            DB::rollBack();
            throw $error;
        }
    }

    public function deleteComment($id)
    {
        $result = DB::table('comments')
            ->delete($id);

        return $result;
    }
}
