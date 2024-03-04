<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request){

        //dd($request->all());
        //return redirect('/');
    }
}
