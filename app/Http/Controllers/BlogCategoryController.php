<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BlogCategoryController
{
    public function getCategoryWithPosts($categoryId, CategoryInterface $blogCategory)
    {
        dump(
            $blogCategory->getCategoryWithPosts($categoryId)
        );
    }

    public function addCategory(Request $request, CategoryInterface $blogCategory)
    {
        $categoryName = $request->get('name');
        $categoryDescription = $request->get('description');

        dump(
            $blogCategory->addCategory($categoryName, $categoryDescription)
        );
    }
}
