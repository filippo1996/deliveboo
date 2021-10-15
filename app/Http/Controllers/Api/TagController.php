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
    public function category(Request $request, $slug = null)
    {
        $results = [
            'success' => false,
            'results' => null
        ];

        if($request->has('tags')){
            $tags =  Tag::pluck('name','slug');
        } else {
            $eloquent = Tag::where('slug', $slug)->with('users');
            $tags = $eloquent->with('users')->first();
        }
        
        if($tags){
            $results = [
                'success' => true,
                'results' => $tags
            ];
        }

        return response()->json($results);
    }
}
