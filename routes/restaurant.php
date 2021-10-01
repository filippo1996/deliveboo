<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Restaurant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register restaurant routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "restaurant" middleware group. Now create something great!
|
*/

// Route access restaurant
Auth::routes();

Route::middleware('auth')->group(function(){
  // Dashboard restaurant
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  // Order
  Route::resource('orders', OrderController::class);

});

