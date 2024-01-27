<?php

namespace App\Models\Repositories;

use App\Helpers\FormatCategoryList;
use App\Models\Interfaces\BlogInterface;
use Illuminate\Support\Facades\DB;

class BlogByQueryBuilder implements BlogInterface
{
    public function __construct(FormatCategoryList $formatCategoryList)
    {
        $this->formatCategoryList = $formatCategoryList;
    }

    public function getBlogs()
    {
        $dataset = DB::table('categories')
            ->select(
                'id  as category_id',
                'name as category_name',
                'description as category_description',
                'created_at as category_created_at',
                'updated_at as category_updated_at',
            )
            ->get()
            ->toArray();

        $result = $this->formatCategoryList
            ->setSourceDataset($dataset)
            ->setMainCategoryPrefix('category')
            ->execute();

        return $result;
    }
}
