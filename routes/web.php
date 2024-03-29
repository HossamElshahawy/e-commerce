<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('welcome');
});


route::get('home',[\App\Http\Controllers\User\IndexController::class,'index']);

route::get('shop',[\App\Http\Controllers\User\IndexController::class,'allProducts']);

route::get('category/{category_slug}',[\App\Http\Controllers\User\IndexController::class,'productsRelatedToCategory'])->name('user.category');
route::get('category/{category_slug}/{product_slug}',[\App\Http\Controllers\User\IndexController::class,'productSinglePage']);

route::get('search',[\App\Http\Controllers\User\IndexController::class,'searchProducts']);

route::get('profile',[\App\Http\Controllers\User\ProfileController::class,'index']);
route::put('profile/update',[\App\Http\Controllers\User\ProfileController::class,'update']);

Route::get('change-password', [\App\Http\Controllers\User\ProfileController::class, 'passwordPage']);
Route::post('change-password', [\App\Http\Controllers\User\ProfileController::class, 'changePassword']);

Route::middleware(['auth'])->group(function (){
    route::get('wishlist',[\App\Http\Controllers\User\WishlistController::class,'index']);
    route::get('cart',[\App\Http\Controllers\User\CartController::class,'index']);
    route::get('checkout',[\App\Http\Controllers\User\CheckoutController::class,'index']);

    route::get('orders',[\App\Http\Controllers\User\OrderController::class,'index']);
    route::get('order/{id}',[\App\Http\Controllers\User\OrderController::class,'show']);


});
route::get('thank-you',[\App\Http\Controllers\User\IndexController::class,'thankYou']);


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.setting');
    Route::post('/setting', [App\Http\Controllers\Admin\SettingController::class, 'store'])->name('admin.settingSaveUpdate');

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

    //Orders
    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function (){
        Route::get('/orders', 'index')->name('order.index');
        Route::get('/order/{order_id}', 'show')->name('order.show');
        Route::put('/order/{order_id}', 'updateOrderStatus')->name('updateOrderStatus');
        Route::get('/order/invoice/{order_id}/generate', 'invoiceDownload')->name('invoice.download');
        Route::get('/order/invoice/{order_id}', 'showInvoice')->name('invoice.show');
        route::get('/order/invoice/{order_id}/mail',[\App\Http\Controllers\Admin\OrderController::class,'mailInvoice'])->name('invoice.mail');
    });

    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function (){
        Route::get('/users', 'index')->name('user.index');
        Route::get('/users/create', 'create')->name('user.create');
        Route::post('/users', 'store')->name('user.store');

        Route::get('/users/{user}/edit',  'edit')->name('user.edit');
        Route::put('/users/{user}/update',  'update')->name('user.update');
        Route::get('/users/{userId}',  'delete')->name('user.delete');
    });

});


Auth::routes();
