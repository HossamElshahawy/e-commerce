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

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    //category
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');

    //brand
    Route::get('/brand', \App\Livewire\Admin\Brand\Index::class)->name('admin.brand');

    //products
    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function (){
        Route::get('/products', 'index')->name('product.index');
        Route::get('/products/create', 'create')->name('product.create');
        Route::post('/products', 'store')->name('product.store');
        Route::get('/products/{product}/edit',  'edit')->name('product.edit');
        Route::put('/products/{product}/update',  'update')->name('product.update');
        Route::get('/products/{product}',  'delete')->name('product.delete');

        // image delete
        Route::get('/product/image/delete/{image}',  'deleteProductImage')->name('productImage.delete');

    });

});
