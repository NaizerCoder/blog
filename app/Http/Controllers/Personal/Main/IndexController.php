<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostUserLike;

class IndexController extends Controller
{
    public function __invoke()
    {

        $info['likes'] = PostUserLike::where('user_id',auth()->user()->id)->count();

        return view('personal.main.index',compact('info'));
    }
}
