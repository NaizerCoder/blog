<?php

namespace App\Http\Controllers\Post;

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
        return view('post.index',compact('posts','posts_random','likedPosts'));
    }
}
