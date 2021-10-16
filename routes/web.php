<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;

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

/*
Route::get('/', function () {
    return view('layouts.web');
});
*/
Route::view('/email', 'emails.order_confirm');

// Verify access restaurant
Route::get('/auth',[RestaurantController::class, 'auth']);
// Route frontend
Route::view('/{any}', 'layouts.web')->where('any','.*');
