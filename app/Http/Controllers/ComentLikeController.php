<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Coment;
use Illuminate\Http\Request;

class ComentLikeController extends Controller
{
    public function store(Coment $coment)
    {
        $coment->like();
    }

    public function destroy(Coment $coment)
    {
        $coment->unliked();
    }
}
