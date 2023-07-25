<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('product/categories', ProductCategoryController::class, array('as' => 'product'))
        ->except('update');
    Route::post('product/categories/{category}', [ProductCategoryController::class, 'update'])
        ->name('product.categories.update');
    Route::apiResource('products', ProductController::class)->except('update', 'index');
    Route::post('products/{product}', [ProductController::class, 'update'])
        ->name('products.update');
});
