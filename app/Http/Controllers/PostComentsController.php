<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\Coment;
use Illuminate\Http\Request;
use App\Http\Resources\ComentResource;

class PostComentsController extends Controller
{
    public function store(Post $post)
    {
        $coment = Coment::create([
            'post_id' => $post->id,
            'user_id' => Auth::user()->id,
            'body' => request('body')
        ]);

        return ComentResource::make($coment);

    }
}
