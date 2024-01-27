<?php

namespace App\Models\Repositories;

use App\Models\Category;
use App\Models\Interfaces\BlogInterface;

class BlogByORM implements BlogInterface
{
    public function getBlogs()
    {
        $result = Category::all()
            ->toArray();

        return $result;
    }
}
