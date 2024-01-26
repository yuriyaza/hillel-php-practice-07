<?php

namespace App\Http\Controllers;

use App\Helpers\CreateCategoryList;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BlogController
{
    public function getBlog(CreateCategoryList $createCategoryList): void
    {
        // Code with Query Builder
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

        $result = $createCategoryList
            ->setSourceDataset($dataset)
            ->setMainCategoryPrefix('category')
            ->execute();

        dump($result);

        // Code with ORM
        $resultOrm = Category::all()
            ->toArray();
        dump($resultOrm);
    }
}
