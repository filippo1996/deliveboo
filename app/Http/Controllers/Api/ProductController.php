<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /*
    public function index(Request $request)
    {
        $eloquent = Product::where('visibility', 1);

        if($request->has('search')){
            $word = $request->query('search');
            $products = $eloquent->where('name', 'LIKE', "%$word%")->get();
            return $products;
        }
    }
    */
}
