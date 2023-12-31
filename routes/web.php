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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::get('/', fn() => redirect()->route('admin.dashboard'));

    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('purchases', \App\Http\Controllers\PurchaseController::class);
    Route::resource('purchase-returns', \App\Http\Controllers\PurchaseReturnController::class);
    Route::resource('sales', \App\Http\Controllers\SaleController::class);
    Route::resource('sale-returns', \App\Http\Controllers\SaleReturnController::class);

    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::resource('stocks', \App\Http\Controllers\StockReportController::class);
    });
});
