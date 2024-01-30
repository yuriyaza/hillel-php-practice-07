<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\CategoryInterface;

class BlogController
{
    public function getBlogs(CategoryInterface $blog)
    {
        dump(
            $blog->getBlogs()
        );
    }
}
