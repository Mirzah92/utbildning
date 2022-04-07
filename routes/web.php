<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriesController;
use App\Models\Post;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*vanlig route*/
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::POST('/posts/', [PostController::class, 'store'])->name('posts.store');

/*Nu gör vi en route model binding och dettta hör ihop med controllen*/
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::PUT('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


/*Route för categories*/

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');

Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::POST('/categories/', [CategoriesController::class, 'store'])->name('categories.store');

Route::get('categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::PUT('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
