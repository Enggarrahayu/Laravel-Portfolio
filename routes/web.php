<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
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

Route::resource('orders', OrderController::class)->only('index','store','create');

Route::get('/deliveries/create/{order_id}', [DeliveryController::class, 'create'])->name('deliveries.create');
Route::resource('deliveries', DeliveryController::class)->only('store','index');