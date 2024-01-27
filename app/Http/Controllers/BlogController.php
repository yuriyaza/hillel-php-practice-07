<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\BlogInterface;

class BlogController
{
    public function getBlogs(BlogInterface $blog)
    {
        dump(
            $blog->getBlogs()
        );
    }
}
