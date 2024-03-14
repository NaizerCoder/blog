<?php

namespace App\Http\Controllers\Frontend\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        //dd($post);
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id',$post->category_id)
                        ->where('id','!=',$post->id)
                        ->get()
                        ->take(3);
        $categories = Category::all();
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(3);
        $tags = Tag::all();
        $post_random = Post::get()->random(1);
        return view('frontend.post.show',compact('post','date','relatedPosts','categories','likedPosts','tags','post_random'));
    }
}
