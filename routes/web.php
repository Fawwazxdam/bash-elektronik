<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactioController;
use App\Http\Controllers\Admin\CategoryControlleradmin;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;

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

Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');
Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    // Route::delete('/cart/{id}',  [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');
    Route::resource('keranjang', CartController::class);

   Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'proses'])->name('checkout');

});


Route::prefix('admin')
->group(function(){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard-admin');
    Route::resource('category', CategoryControlleradmin::class);
    Route::resource('users', UsersController::class);
    Route::resource('product', ProductController::class);
    Route::resource('gallery', ProductGalleryController::class);
    Route::resource('transaction', TransactioController::class);
    
});