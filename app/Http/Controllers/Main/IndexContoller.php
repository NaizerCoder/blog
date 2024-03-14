<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexContoller extends Controller
{
    public function __invoke()
    {
        return redirect()->route('frontend.main.index');
    }
}
