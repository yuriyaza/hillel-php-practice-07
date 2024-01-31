<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class BlogCategoryController
{
    public function getCategoryWithPosts(CategoryInterface $blogCategory, $categoryId)
    {
        dump(
            $blogCategory->getCategoryWithPosts($categoryId)
        );
    }

    public function addCategory(CategoryInterface $blogCategory, Request $request)
    {
        $categoryName = $request->get('name');
        $categoryDescription = $request->get('description');

        dump(
            $blogCategory->addCategory($categoryName, $categoryDescription)
        );
    }
}
