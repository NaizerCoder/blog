<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if(isset($data['tags'])) {

            $tags = $data['tags'];
            unset($data['tags']);
        }

        $data['main_image']  = Storage::put("/images",$data['main_image']);
        $data['preview_image']  = Storage::put("/images",$data['preview_image']);

        $post = Post::firstOrCreate($data);

        if(isset($tags)) {

            $post->tags()->attach($tags);

        }
        return redirect()->route('admin.post.index');
    }

}
