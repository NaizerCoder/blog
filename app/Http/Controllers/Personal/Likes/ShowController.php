<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('personal.like.show',compact('post'));
    }
}
