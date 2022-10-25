<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactioController;
use App\Http\Controllers\Admin\CategoryControlleradmin;
use App\Http\Controllers\Admin\ProductGalleryController;

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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/detail', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::get('/dashboard', [App\Http\Controllers\dashboardUserController::class, 'index'])->name('dashboard-user');
Route::get('/dashboard-transactions', [App\Http\Controllers\dashboardTransactionController::class, 'index'])->name('dashboard-transaction');
Route::get('/dashboard-setting', [App\Http\Controllers\dashboardSettingController::class, 'index'])->name('dashboard-setting');




Route::prefix('admin')
->group(function(){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard-admin');
    Route::resource('category', CategoryControlleradmin::class);
    Route::resource('users', UsersController::class);
    Route::resource('product', ProductController::class);
    Route::resource('gallery', ProductGalleryController::class);
    Route::resource('transaction', TransactioController::class);
    
});

Route::get('template', function () {
    return view('pages/seller/template');
});

Route::get('dashboard', function () {
    return view('pages/seller/dashboard');
});

Route::get('product', function () {
    return view('pages/seller/product');
});

Route::get('/dashboard/products', [\App\Http\Controllers\DashboardProductController::class, 'index'])
        ->name('product');
Route::get('/dashboard/products/create', [\App\Http\Controllers\DashboardProductController::class, 'create'])
        ->name('productAdd');
Route::post('/dashboard/products', [\App\Http\Controllers\DashboardProductController::class, 'store'])
        ->name('insert');
// Route::post('/dashboard/products', 'DashboardProductController@store')
// //         ->name('dashboardProductStore');
// Route::get('/dashboard/products/{id}', 'DashboardProductController@details')
//         ->name('dashboard-product-details');
// Route::post('/dashboard/products/{id}', 'DashboardProductController@update')
//         ->name('dashboard-product-update');

// Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')
//         ->name('dashboard-product-gallery-upload');
// Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')
//         ->name('dashboard-product-gallery-delete');