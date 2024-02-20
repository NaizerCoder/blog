<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $likePosts = auth()->user()->likePosts;
        return view('personal.like.index',compact('likePosts'));
    }
}
