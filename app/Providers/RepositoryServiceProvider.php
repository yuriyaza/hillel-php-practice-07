<?php

namespace App\Providers;

use App\Models\Interfaces\CategoryInterface;
use App\Models\Interfaces\CommentInterface;
use App\Models\Interfaces\PostInterface;
use App\Models\Repositories\CategoryByORM;
use App\Models\Repositories\CategoryByQueryBuilder;
use App\Models\Repositories\CommentByORM;
use App\Models\Repositories\CommentByQueryBuilder;
use App\Models\Repositories\PostByORM;
use App\Models\Repositories\PostByQueryBuilder;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
//      Прив'язка інтерфейсу до QueryBuilder або ORM. Непотрібне закоментувати.

//        $this->app->bind(CategoryInterface::class, CategoryByQueryBuilder::class);
        $this->app->bind(CategoryInterface::class, CategoryByORM::class);

//        $this->app->bind(CommentInterface::class, CommentByQueryBuilder::class);
        $this->app->bind(CommentInterface::class, CommentByORM::class);

//        $this->app->bind(PostInterface::class, PostByQueryBuilder::class);
        $this->app->bind(PostInterface::class, PostByORM::class);
    }

    public function boot(): void
    {

    }
}
