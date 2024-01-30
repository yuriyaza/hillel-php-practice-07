<?php

namespace App\Models\Interfaces;

interface CategoryInterface
{
    public function getBlogs();
    public function getCategory($categoryId);
    public function addCategory($categoryName, $categoryDescription);
}
