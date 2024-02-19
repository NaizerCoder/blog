<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $user_current = auth()->user();
        return view('personal.comment.index',compact('user_current'));
    }
}
