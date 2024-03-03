<?php

namespace App\Models\Repositories;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Interfaces\CommentInterface;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CommentByORM implements CommentInterface
{
    public function addComment($postId, $comment)
    {
        try {
            DB::beginTransaction();

            $newComment = new Comment();
            $newComment->post_id = $postId;
            $newComment->content = $comment;
            $newComment->save();

            Post::where('id', '=', $postId)
                ->update([
                    'updated_at' => now(),
                ]);

            $categoryID = Post::where('id', '=', $postId)
                ->value('category_id');

            Category::where('id', '=', $categoryID)
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
        $result = Comment::where('id', '=', $id)
            ->delete();

        return $result;
    }
}
