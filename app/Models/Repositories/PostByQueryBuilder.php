<?php

namespace App\Models\Repositories;

use App\Helpers\FormatCategoryList;
use App\Models\Interfaces\PostInterface;
use Illuminate\Support\Facades\DB;

class PostByQueryBuilder implements PostInterface
{
    public function __construct(FormatCategoryList $formatCategoryList)
    {
        $this->createCategoryList = $formatCategoryList;
    }

    public function getPosts($categoryId, $postId)
    {
        $dataset = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->select(
                'posts.id as post_id',
                'posts.title as post_title',
                'posts.content as post_content',
                'posts.created_at as post_created_at',
                'posts.updated_at as post_updated_at',
                'posts.category_id as post_category_id',

                'comments.id as comment_id',
                'comments.content as comment_content',
                'comments.created_at as comment_created_at',
                'comments.updated_at as comment_updated_at',
                'comments.post_id as comment_post_id',
            )
            ->where('categories.id', '=', $categoryId)
            ->where('posts.id', '=', $postId)
            ->get()
            ->toArray();

        $result = $this->createCategoryList
            ->setSourceDataset($dataset)
            ->setMainCategoryPrefix('post')
            ->setSubCategoryPrefix('comment')
            ->execute();

        return $result;
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
