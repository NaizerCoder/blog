<?php

namespace App\Http\Controllers\Frontend\Main;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        //dd($posts);
        return view('frontend.layouts.main',compact('posts','categories'));
    }
}
