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

// Route::get('/', 'HomeController@index')
//      ->name('home')
//      ->middleware(['auth','admin']);

Route::prefix('/')
    ->middleware(['auth','admin'])
    ->group(function() {
        
        Route::resource('', 'HomeController');
        Route::resource('sales', 'SalesController');
        Route::resource('purchases', 'PurchasesController');
        Route::resource('farmers', 'FarmerController');
        Route::resource('users', 'UserController');
        Route::resource('weightdata', 'WeightController');
        Route::resource('reports', 'ReportController');



    });



Auth::routes(['verify'=>true]);



