<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryRouteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StringMatchController;
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

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('orders', OrderController::class)->only(['index', 'store', 'create']);
  Route::get('/deliveries/create/{order_id}', [DeliveryController::class, 'create'])->name('deliveries.create');
  Route::resource('deliveries', DeliveryController::class)->only(['store', 'index']);
  Route::resource('delivery_routes', DeliveryRouteController::class);
  Route::post('/check-match', [StringMatchController::class, 'checkMatch'])->name('check-match');
  Route::get('/check-match', [StringMatchController::class, 'index'])->name('check-match.index');
});
