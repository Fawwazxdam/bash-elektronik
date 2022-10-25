<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('product', function () {
    return view('pages/seller/product');
});

Route::get('/dashboard/products', [\App\Http\Controllers\DashboardProductController::class, 'index'])
        ->name('product');
Route::get('/dashboard/products/create', 'DashboardProductController@create')
        ->name('dashboard-product-create');
Route::post('/dashboard/products', 'DashboardProductController@store')
        ->name('dashboard-product-store');
Route::get('/dashboard/products/{id}', 'DashboardProductController@details')
        ->name('dashboard-product-details');
Route::post('/dashboard/products/{id}', 'DashboardProductController@update')
        ->name('dashboard-product-update');

Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')
        ->name('dashboard-product-gallery-upload');
Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')
        ->name('dashboard-product-gallery-delete');