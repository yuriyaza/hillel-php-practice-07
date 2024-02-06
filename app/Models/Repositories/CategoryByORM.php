<?php

namespace App\Models\Repositories;

use App\Models\Category;
use App\Models\Interfaces\CategoryInterface;

class CategoryByORM implements CategoryInterface
{
    public function getCategories()
    {
        $blogs = Category::all()
            ->toArray();

        return $blogs;
    }

    public function getCategoryWithPosts($categoryId)
    {
        $categoryAndPosts = Category::with('post')
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();

        return $categoryAndPosts;
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
