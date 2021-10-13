<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirm;
use Braintree;
use App\Models\Order;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Braintree\Gateway(config('braintree'));
    }

    public function index(Request $request)
    {
        
        $data = $request->all();
        
        $gateway = $this->gateway;
    
        $result = $gateway->transaction()->sale([
        'amount' => $data['totalPrice'],
        'paymentMethodNonce' => $data['payment_method_nonce'],
        //'deviceData' => $deviceDataFromTheClient,
        'options' => [
            'submitForSettlement' => true
        ]
        ]);
    
        if($result->success){
        
            // Save Order
            self::saveOrder($data);

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

    protected static function saveOrder($request)
    {
        $customer = $request['address'];
        $user = $request['cart']['user'];
        $products = $request['cart']['items'];

        // Save order in the database
        $order = new Order();
        $order->user_id = $user['id'];
        $order->name = $customer['name'];
        $order->lastname = $customer['lastname'];
        $order->email = $customer['email'];
        $order->price = $request['totalPrice'];
        $order->phone_number = $customer['phone_number'];
        $order->address = $customer['route'];
        $order->house_number = $customer['street_number'];
        $order->postal_code = $customer['postal_code'];
        $order->city = $customer['locality'];
        $order->country = $customer['country'];

        $order->save();

        // save in the pivot table
        foreach( $request['cart']['items'] as $product ){
            $order->products()->attach($product['product']['id'], ['qty' => $product['qty']]);
        }

        $emails['customer'] = $customer['email'];
        $emails['user'] = $user['email'];

        // send email order
        Mail::to($emails)->send(new OrderConfirm($request));
    }
}
