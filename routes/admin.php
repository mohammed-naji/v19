<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/home', function() { return 'Admin home'; })->name('home');
    Route::get('/posts', function() { return 'Admin posts'; })->name('posts');
    Route::get('/products', function() { return 'Admin products'; })->name('products');
    Route::get('/orders', function() { return 'Admin orders'; })->name('orders');
});





//
