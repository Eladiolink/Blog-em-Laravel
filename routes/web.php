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

Route::get('/',[PostsController::class,'show'])->name('posts.show');

Route::prefix('/admin')->group(function(){
     Route::get('/',[AdminController::class,'show'])->name('admin.show');
     Route::get('/add',[AdminController::class,'create'])->name('admin.posts.add');
     Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.posts.edit');
     Route::post('/add',[AdminController::class,'store'])->name('admin.posts.store');
     Route::delete('/del/{id}',[AdminController::class,'destroy'])->name('admin.posts.destroy');
     
});  