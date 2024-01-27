<?php

namespace App\Models\Interfaces;

interface BlogCategoryInterface
{
    public function getCategories($categoryId);
    public function addCategory($categoryName, $categoryDescription);
}
