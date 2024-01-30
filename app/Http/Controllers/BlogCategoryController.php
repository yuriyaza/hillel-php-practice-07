<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class BlogCategoryController
{
    public function getCategory(CategoryInterface $blogCategory, $categoryId)
    {
        dump(
            $blogCategory->getCategory($categoryId)
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
