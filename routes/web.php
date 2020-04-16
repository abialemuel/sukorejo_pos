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

Route::get('/', 'HomeController@index')->name('home')->middleware(['auth','admin']);
Auth::routes(['verify'=>true]);


Route::prefix('sales')->group(function () {
    Route::get('/', 'SalesController@index')->name('sales.index');
});

Route::prefix('purchases')->group(function () {
    Route::get('/', 'PurchasesController@index')->name('purchases.index');
});