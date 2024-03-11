<?php

namespace App\Http\Controllers\Frontend\Main;
use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(3);
        //dd($posts);
        return view('frontend.main.index',compact('posts'));
    }
}
