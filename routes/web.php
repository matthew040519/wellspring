<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {

        $products = \App\Models\Product::all();

        return view('index', compact('products'));
    })->name('index');

    Route::post('/buy-product', [ProductController::class, 'buyProduct'])->name('buy-product');

    Route::get('/login', function () {
        return view('Auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login_user');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/getOrders/{username}', [ProductController::class, 'getOrders'])->name('get-orders');



    Route::middleware(['throttle:60,1'])->group(function () {
        // Place routes here that should be throttled as a group
        Route::middleware(['auth:sanctum', 'role:1'])->group(function () {

            Route::get('/admin/dashboard', function () {
                return view('admin.Dashboard');
            })->name('admin.dashboard');

            Route::get('/admin/products', [ProductController::class, 'adminProducts'])->name('admin.products');
            Route::post('/admin/products', [ProductController::class, 'storeProduct'])->name('admin.products.store');

            Route::get('/admin/orders', [ProductController::class, 'adminOrders'])->name('admin.orders');
            Route::delete('/admin/orders/{order}', [ProductController::class, 'destroyOrder'])->name('admin.orders.destroy');
            Route::get('/admin/orders/{order}', [ProductController::class, 'updateOrder'])->name('admin.orders.update');
        });
    });