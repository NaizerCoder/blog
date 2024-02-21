<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;

class IndexController extends Controller
{
    public function __invoke()
    {

        $info['likes'] = PostUserLike::where('user_id', auth()->user()->id)->count();
        $info['comments'] = Comment::where('user_id', auth()->user()->id)->count();

        /*
         *
         * $comments = Comment::where('user_id',auth()->user()->id)->get();
        foreach ($comments as $comment){

            dump($comment->post->content);

        }
        dd();
        */

        return view('personal.main.index', compact('info'));
    }
}
