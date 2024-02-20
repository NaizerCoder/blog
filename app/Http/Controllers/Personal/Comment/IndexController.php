<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {

        //dd(auth()->user()->postComment);

        $comments = auth()->user()->comments;
        foreach($comments as $key=>$comment){

            $data[$key]['comment'] = $comment->message;
            $data[$key]['post'] = Post::find($comment->post_id);
        }
        dd($data);

        return view('personal.comment.index',compact('comments'));
    }
}
