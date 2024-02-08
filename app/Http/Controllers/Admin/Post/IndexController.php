<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Personal;

class IndexController extends Controller
{
    public function __invoke()
    {
        dd( Personal\RandomName::get(5));
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }
}
