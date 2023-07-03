<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get( '/posts',[PostController::class, 'index'] )->name( 'posts.index' );

Route::get( '/showLatestPost',[PostController::class, 'showLatestPost'] )->name( 'posts.showLatestPost' );

Route::get( '/latest-posts_cat', [PostController::class, 'showLatestPostCat'] )->name( 'latest-posts-cat' );

Route::delete( '/posts/{id}/delete', [PostController::class, 'delete'] )->name( 'posts.delete' );

Route::get( '/categories/{id}/posts', [CategoryController::class, 'getPostsByCategoryId'] )->name( 'categories.posts' );