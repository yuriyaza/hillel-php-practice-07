<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class BlogController
{
    public function getBlog(): void
    {
        // Code with Query Builder
        $result = DB::table('categories')
            ->select('name', 'description')
            ->get()
            ->toArray();
        dump($result);

        // Code with ORM
        $resultOrm = Category::all('name', 'description')
            ->toArray();
        dump($resultOrm);
    }
}
