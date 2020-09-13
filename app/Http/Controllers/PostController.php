<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::latest()->paginate();
    }
    
    public function store(Request $request)
    {
        $res = Post::create([
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);
        return $res;
    }
}
