<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ContactController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/restaurants',[RestaurantController::class, 'index']);
Route::get('/restaurant/{slug}', [RestaurantController::class, 'showProducts']);
Route::get('/category/{slug?}', [TagController::class, 'category']);
Route::get('/search/restaurants', [RestaurantController::class, 'search']);
Route::post('/payment', [PaymentController::class, 'index']);
// Contact
Route::post('/contact', [ContactController::class, 'contact']);