<?php

namespace App\Providers;

use App\Models\Interfaces\BlogCategoryInterface;
use App\Models\Interfaces\BlogCommentInterface;
use App\Models\Interfaces\BlogInterface;
use App\Models\Interfaces\BlogPostInterface;
use App\Models\Repositories\BlogByORM;
use App\Models\Repositories\BlogByQueryBuilder;
use App\Models\Repositories\BlogCategoryByORM;
use App\Models\Repositories\BlogCategoryByQueryBuilder;
use App\Models\Repositories\BlogCommentByORM;
use App\Models\Repositories\BlogCommentByQueryBuilder;
use App\Models\Repositories\BlogPostByORM;
use App\Models\Repositories\BlogPostByQueryBuilder;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BlogCategoryInterface::class, BlogCategoryByQueryBuilder::class);
        $this->app->bind(BlogCommentInterface::class, BlogCommentByQueryBuilder::class);
        $this->app->bind(BlogInterface::class, BlogByQueryBuilder::class);
        $this->app->bind(BlogPostInterface::class, BlogPostByQueryBuilder::class);
    }

    public function boot(): void
    {

    }
}
