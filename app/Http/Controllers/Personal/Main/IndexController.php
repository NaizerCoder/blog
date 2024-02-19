<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {

        $info['users'] = User::all()->count();
        $user_current = auth()->user();
        $info['post'] = Post::all()->count();
        $info['categories'] = Category::all()->count();
        $info['tags'] = Tag::all()->count();

        return view('personal.main.index',compact('info','user_current'));
    }
}
