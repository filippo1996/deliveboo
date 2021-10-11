<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Braintree\Gateway(config('braintree'));
    }

    public function index(Request $request)
    {
        $gateway = $this->gateway;
        
        $data = $request->all();
    
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

        return response()->json([
            'success' => false,
            'code' => $result->transaction->processorResponseCode,
            'text' => $result->transaction->processorResponseText
        ]);
    
        } else {
            $errors = [];
        
            foreach($result->errors->deepAll() as $error){
                $errors['code'] = $error->code;
                $errors['message'] = $error->message;
            }
        
            return response()->json([
                'success' => false,
                'errors' => $errors
            ]);
        }
    }
}
