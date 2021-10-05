<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $results = [
            'success' => false,
            'results' => null
        ];

        //$restaurants = Tag::where('slug', $slug)->with('users')->first();
        $restaurants = Tag::where('slug', $slug)->first();
        
        if($restaurants){
            $results = [
                'success' => true,
                'results' => $restaurants->users
            ];
        }

        return response()->json($results);
    }
}
