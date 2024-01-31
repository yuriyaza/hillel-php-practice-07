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
}
