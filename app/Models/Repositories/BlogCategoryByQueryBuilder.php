<?php

namespace App\Models\Repositories;

use App\Helpers\FormatCategoryList;
use App\Models\Interfaces\BlogCategoryInterface;
use Illuminate\Support\Facades\DB;

class BlogCategoryByQueryBuilder implements BlogCategoryInterface
{
    public function __construct(FormatCategoryList $formatCategoryList)
    {
        $this->formatCategoryList = $formatCategoryList;
    }

    public function getCategories($categoryId)
    {
        $dataset = DB::table('categories')
            ->join('posts', 'posts.category_id', '=', 'categories.id')
            ->select(
                'categories.id as category_id',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.created_at as category_created_at',
                'categories.updated_at as category_updated_at',

                'posts.id as post_id',
                'posts.title as post_title',
                'posts.content as post_content',
                'posts.created_at as post_created_at',
                'posts.updated_at as post_updated_at',
                'posts.category_id as post_category_id',
            )
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();

        $result = $this->formatCategoryList
            ->setSourceDataset($dataset)
            ->setMainCategoryPrefix('category')
            ->setSubCategoryPrefix('post')
            ->execute();

        return $result;
    }

    public function addCategory($categoryName, $categoryDescription)
    {
        $result = DB::table('categories')
            ->insert([
                'name' => $categoryName,
                'description' => $categoryDescription
            ]);

        return $result;
    }
}
