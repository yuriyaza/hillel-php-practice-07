<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/blog/viewPost', [App\Http\Controllers\BlogPostController::class, 'viewPostWithComments']);

Route::get('/blog/addCategory', [App\Http\Controllers\BlogCategoryController::class, 'addCategory']);
Route::get('/blog/updatePost', [App\Http\Controllers\BlogPostController::class, 'updatePost']);
Route::get('/blog/addComment', [App\Http\Controllers\BlogCommentController::class, 'addComment']);
Route::get('/blog/deleteComment', [App\Http\Controllers\BlogCommentController::class, 'deleteComment']);

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'getCategories']);
Route::get('/blogWithComments', [App\Http\Controllers\BlogController::class, 'getCategoriesWithComments']);
Route::get('/blog/{categoryId}', [App\Http\Controllers\BlogCategoryController::class, 'getCategoryWithPosts']);
Route::get('/blog/{categoryId}/{postId}', [App\Http\Controllers\BlogPostController::class, 'getPostWithComments']);
