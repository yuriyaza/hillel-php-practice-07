<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\BlogCategoryInterface;
use Illuminate\Http\Request;

class BlogCategoryController
{
    public function getCategories(BlogCategoryInterface $blogCategory, $categoryId)
    {
        dump(
            $blogCategory->getCategories($categoryId)
        );
    }

    public function addCategory(BlogCategoryInterface $blogCategory, Request $request)
    {
        $categoryName = $request->get('name');
        $categoryDescription = $request->get('description');

        dump(
            $blogCategory->addCategory($categoryName, $categoryDescription)
        );
    }
}
