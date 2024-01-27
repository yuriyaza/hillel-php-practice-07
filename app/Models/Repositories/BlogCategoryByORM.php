<?php

namespace App\Models\Repositories;

use App\Models\Category;
use App\Models\Interfaces\BlogCategoryInterface;

class BlogCategoryByORM implements BlogCategoryInterface
{
    public function getCategories($categoryId)
    {
        $result = Category::with('post')
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();

        return $result;
    }

    public function addCategory($categoryName, $categoryDescription)
    {
        $category = new Category;
        $category->name = $categoryName;
        $category->description = $categoryDescription;
        $result = $category->save();

        return $result;
    }
}
