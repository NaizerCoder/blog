<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostUserLike;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {

        auth()->user()->likePosts()->detach($post->id);
        return redirect()->route('personal.like.index');

    }
}
