<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostsController,AdminController};

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

Route::prefix('/admin')->group(function(){
     Route::get('/',[AdminController::class,'show'])->name('admin.show');

     Route::get('/add',[AdminController::class,'create'])->name('admin.posts.add');
     Route::get('/add/categories',[AdminController::class,'addCategories'])->name('admin.categories.add');

     Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.posts.edit');
     Route::get('/edit/category/{id}',[AdminController::class,'editCategory'])->name('admin.category.edit');

     Route::post('/add',[AdminController::class,'store'])->name('admin.posts.store');
     Route::post('/add/categories',[AdminController::class,'storeCategories'])->name('admin.categories.store');

     Route::delete('/del/{id}',[AdminController::class,'destroy'])->name('admin.posts.destroy');
     Route::delete('/del/category/{id}',[AdminController::class,'destroyCategory'])->name('admin.category.destroy');

     Route::put('/update/{id}',[AdminController::class,'update'])->name('admin.posts.update');
     Route::put('/update/category/{id}',[AdminController::class,'updateCategory'])->name('admin.category.update');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//      return view('dashboard');
//  })->name('dashboard');
 
 Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[PostsController::class,'show'])->name('dashboard');

Route::get('/',[PostsController::class,'show'])->name('posts.show');
Route::get('/{id}',[PostsController::class,'showPost'])->name('post.show');

