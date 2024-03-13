<?php

namespace App\Http\Controllers\Frontend\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
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
        return view('frontend.post.show',compact('post','date','relatedPosts','categories'));
    }
}
