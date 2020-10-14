<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Image;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(
            Post::with(['images','user'])->latest()->paginate()
        );
    }
    
    public function store(Request $request)
    {
        $paths = [];
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $paths[] = $image->store('public');
            }
        }    

        $res = Post::create([
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);

        if($paths){
            foreach($paths as $path) {
                Image::create([
                    'post_id' => $res->id,
                    'path' => $path
                ]);
            }
        }

        return PostResource::collection(
            Post::with('images')->whereId($res->id)->get()
        );
        
    }
}
