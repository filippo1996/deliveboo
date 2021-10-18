<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Log;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $data = $request->all();
         // send email order
         try{
            Mail::to($data['email'])->send(new Contact($data));
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $exception->getMessage();
        }
    }
}
