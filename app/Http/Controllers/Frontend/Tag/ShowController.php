<?php

namespace App\Http\Controllers\Frontend\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->posts()->paginate(3);
        $tags = Tag::all();
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(3);
        $categories = Category::all();
        $post_random = Post::get()->random(1);

        return view('frontend.tag.show',compact('posts','categories','likedPosts','tags','tag','categories','post_random'));

    }
}
