<?php

namespace App\Http\Controllers\Frontend\Main;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('frontend.main.index');
    }
}
