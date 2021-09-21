<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blogs;

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


Route::prefix('admin')->group(function () {
    Route::prefix('blog')->group(function () { 
        Route::get('/',[Blogs::class, 'index'])->name('blog.list');
        Route::get('/add',[Blogs::class, 'formAdd'])->name('blog.add');
        Route::post('/add',[Blogs::class, 'saveAdd']);
        Route::get('/edit/{id}',[Blogs::class, 'formEdit'])->name('blog.edit');
        Route::post('/edit/{id}',[Blogs::class, 'saveEdit']);
        Route::get('/{id}',[Blogs::class, 'delete'])->name('blog.remove');
    });
});

Route::get('/cate-search/{id}', [Blogs::class, 'cateSearch'])->name('cate.search');
