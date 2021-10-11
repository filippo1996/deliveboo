<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\ProductController;
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

Route::get('/restaurants',[RestaurantController::class,'index']);
Route::get('/restaurant/{slug}', [RestaurantController::class, 'showProducts']);
Route::get('/category/{slug}', [TagController::class, 'category']);
Route::get('/products', [ProductController::class, 'index']);

Route::post('/payment', function(){

  $gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => '7sqb2c99q7hnvmzj',
    'publicKey' => 'wtyk398579nwn26j',
    'privateKey' => 'e6b61bac7ae2084ee7f44dc1a0fcfe31'
  ]);

  $data = request()->all();

  $result = $gateway->transaction()->sale([
    'amount' => $data['totalPrice'],
    'paymentMethodNonce' => $data['payment_method_nonce'],
    //'deviceData' => $deviceDataFromTheClient,
    'options' => [
      'submitForSettlement' => true
    ]
  ]);

  if($result->success){
    return response()->json([
      'success' => true,
    ]);
  } else if ($result->transaction) {
    /*
    dump("Error processing transaction:");
    dump("\n  code: " . $result->transaction->processorResponseCode);
    dump("\n  text: " . $result->transaction->processorResponseText);
    */
    return response()->json([
      'success' => false,
      'code' => $result->transaction->processorResponseCode,
      'text' => $result->transaction->processorResponseText
    ]);

  } else {
    $errors = [];

    foreach($result->errors->deepAll() as $error){
      //dump("$error->code : $error->message \n");
      $errors['code'] = $error->code;
      $errors['message'] = $error->message;
    }

    return response()->json([
      'success' => false,
      'errors' => $errors
    ]);
  }

});