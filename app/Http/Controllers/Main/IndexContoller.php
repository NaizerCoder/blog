<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexContoller extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(3);
        $posts_random = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
        //dd($likedPosts);
        return view('main.index',compact('posts','posts_random','likedPosts'));
    }
}
