<?php

namespace App\Models\Interfaces;

interface CategoryInterface
{
    public function getCategories();
    public function getCategoriesWithComments();
    public function getCategoryWithPosts($categoryId);
    public function addCategory($categoryName, $categoryDescription);
}
