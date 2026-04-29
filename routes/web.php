<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/buy-product', [ProductController::class, 'buyProduct'])->name('buy-product');
