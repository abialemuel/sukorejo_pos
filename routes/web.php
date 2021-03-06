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
        Route::get('/sales/getNetto/{id}', 'SalesController@getNetto')->name('sales.getNetto');
        Route::get('/sales/print-pdf/{id}', 'SalesController@printPdf')->name('sales.printPdf');


        Route::resource('purchases', 'PurchasesController');
        Route::get('/purchases/payment/{pembelian}', 'PurchasesController@payment')->name('purchases.payment');
        Route::get('/purchases/editpayment/{id}', 'PurchasesController@editpayment')->name('purchases.editpayment');
        Route::get('/purchases/updatepayment/{id}', 'PurchasesController@updatepayment')->name('purchases.updatepayment');
        Route::get('/purchases/getNetto/{id}', 'PurchasesController@getNetto')->name('purchases.getNetto');
        Route::get('/purchases/print-pdf/{id}', 'PurchasesController@printPdf')->name('purchases.printPdf');
        Route::get('/purchases/export/{id}', 'PurchasesController@export')->name('purchases.export');
        Route::get('/purchases/dailyexport/{id}', 'PurchasesController@exportharian')->name('purchases.exportharian');

        Route::resource('farmers', 'FarmerController');
        Route::resource('users', 'UserController');
        Route::resource('weightdata', 'WeightController');

        Route::resource('reports', 'ReportController');
        Route::get('/reports/print-pdf/{id}', 'ReportController@printPdf')->name('pnl.printPdf');


    });



Auth::routes(['verify'=>true]);