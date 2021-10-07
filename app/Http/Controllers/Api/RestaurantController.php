<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = User::with('tags')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    /**
     * Show all products active in the restaurant
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function showProducts($slug)
    {
        $restaurant = User::with('products')->where('slug', $slug)->firstOrFail();
        return $restaurant;
    }

}
