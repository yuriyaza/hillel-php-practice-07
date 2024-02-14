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
        $categoryAndPosts = Category::with('posts')
            ->where('categories.id', '=', $categoryId)
            ->get()
            ->toArray();

        return $categoryAndPosts;
    }

    public function getCategoriesWithComments()
    {
        $blogs = Category::with('comments')
            ->get()
            ->toArray();

        return $blogs;
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
