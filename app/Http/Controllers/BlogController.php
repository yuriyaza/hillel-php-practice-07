<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CategoryInterface;

class BlogController
{
    public function getCategories(CategoryInterface $blog)
    {
        dump(
            $blog->getCategories()
        );
    }

    public function getCategoriesWithComments(CategoryInterface $blog)
    {
        dump(
            $blog->getCategoriesWithComments()
        );
    }
}
