<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Personal\RandomName;


class IndexController extends Controller
{
    public function __invoke()
    {
        // dump( RandomName::get(5));
        //dump( RandomName::get(5));
        //dd();
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));



    }
}
