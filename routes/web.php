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


route::get('home',[\App\Http\Controllers\User\IndexController::class,'index']);

//route::get('shop',[\App\Http\Controllers\User\IndexController::class,'allProducts']);

route::get('category/{category_slug}',[\App\Http\Controllers\User\IndexController::class,'productsRelatedToCategory'])->name('user.category');
route::get('category/{category_slug}/{product_slug}',[\App\Http\Controllers\User\IndexController::class,'productSinglePage']);

route::get('wishlist',[\App\Http\Controllers\User\WishlistController::class,'index']);


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

        //product color Quantity
        Route::post('/product-color/{product_color_id}',  'updatedProductColorQty');

        //product delete Color
        Route::get('/product-color/{product_color_id}/delete',  'deletedProductColorQty');

    });

    //Colors
    Route::controller(\App\Http\Controllers\Admin\ColorController::class)->group(function (){
        Route::get('/colors', 'index')->name('color.index');
        Route::get('/colors/create', 'create')->name('color.create');
        Route::post('/colors', 'store')->name('color.store');
        Route::get('/colors/{color}/edit',  'edit')->name('color.edit');
        Route::put('/colors/{color}/update',  'update')->name('color.update');
        Route::get('/colors/{color}',  'delete')->name('color.delete');


    });

    //Slider
    Route::controller(\App\Http\Controllers\Admin\SliderController::class)->group(function (){
        Route::get('/sliders', 'index')->name('slider.index');
        Route::get('/sliders/create', 'create')->name('slider.create');
        Route::post('/sliders', 'store')->name('slider.store');

        Route::get('/sliders/{slider}/edit',  'edit')->name('slider.edit');
        Route::put('/sliders/{slider}/update',  'update')->name('slider.update');
        Route::get('/sliders/{slider}',  'delete')->name('slider.delete');
    });

});





Auth::routes();
