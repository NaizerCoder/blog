<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Post $post)
    {

        /*
         $postOne = POST::find(3);
         $comments = auth()->user()->comments;
         */

        $comments = auth()->user()->comments;
        //dd($comments);
        foreach($comments as $key=>$comment){

            $data[$key]['id'] = $comment->id;
            $data[$key]['message'] = $comment->message;
            $data[$key]['post']['title'] = Post::find($comment->post_id)->title;
            $data[$key]['post']['content'] = Post::find($comment->post_id)->content;

        }
        $comments = json_decode(json_encode($data), FALSE);

        /*
        foreach ($data as $key=>$datum){

            dump($datum);
            foreach ($datum['post'] as $post){
                dump($post['title']);
            }
        }
        */

        return view('personal.comment.index',compact('comments'));
    }
}
