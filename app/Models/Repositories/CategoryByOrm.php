<?php

namespace App\Models\Repositories;

use App\Models\Category;
use App\Models\Interfaces\BlogInterface;
use App\Models\Interfaces\CategoryInterface;

class CategoryByOrm implements CategoryInterface
{
    public function getBlogs()
    {
        $result = Category::all()
            ->toArray();

        return $result;
    }

    public function getCategory($categoryId)
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
