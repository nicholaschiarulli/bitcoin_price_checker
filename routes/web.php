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

Route::get('/', 'App\Http\Controllers\BitcoinPriceController@index');

Route::get('/btc-price', 'App\Http\Controllers\BitcoinPriceController@getCurrentBtcPrice');

Route::get('/inquiry', 'App\Http\Controllers\BitcoinPriceController@getInquiries');
