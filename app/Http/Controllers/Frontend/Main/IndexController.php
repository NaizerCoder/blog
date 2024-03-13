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
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(3);
        //dd($likedPosts);
        return view('frontend.main.index',compact('posts','categories','likedPosts'));
    }
}
