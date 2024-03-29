<?php

namespace App\Models\Repositories;

use App\Models\Interfaces\PostInterface;
use Illuminate\Support\Facades\DB;

class PostByQueryBuilder implements PostInterface
{
    public function getPostWithComments($postId)
    {
        $dataset = DB::table('posts')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->select(
                'posts.*',
                'comments.id as comment_id',
                'comments.content as comment_content',
                'comments.created_at as comment_created_at',
                'comments.updated_at as comment_updated_at',
                'comments.post_id as comment_post_id',
            )
            ->where('posts.id', '=', $postId)
            ->orderBy('comments.updated_at', 'desc')
            ->get()
            ->toArray();

        $comments = [];
        foreach ($dataset as $item) {
            $comments[] = [
                'id' => $item->comment_id,
                'content' => $item->comment_content,
                'created_at' => $item->comment_created_at,
                'updated_at' => $item->comment_updated_at,
                'post_id' => $item->comment_post_id,
            ];
        }

        $postAndComments[] = [
            'id' => $dataset[0]->id,
            'title' => $dataset[0]->title,
            'content' => $dataset[0]->content,
            'created_at' => $dataset[0]->created_at,
            'updated_at' => $dataset[0]->updated_at,
            'category_id' => $dataset[0]->category_id,
            'comments' => $comments,
        ];

        return $postAndComments;
    }

    public function updatePost($id, $title, $content)
    {
        $result = DB::table('posts')
            ->where('id', '=', $id)
            ->update([
                'title' => $title,
                'content' => $content
            ]);

        return $result;
    }
}
