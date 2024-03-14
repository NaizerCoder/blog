<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->post()->paginate(3);
        $categories = Category::all();
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(3);
        $tags = Tag::all();
        $post_random = Post::get()->random(1);
        return view('frontend.category.show',compact('posts','categories','likedPosts','tags','category','post_random'));

    }
}
