<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){

        if(isset($data['tags'])) {

            $tags = $data['tags'];
            unset($data['tags']);
        }

        //$file = $request->file($data['main_image']);

        $data['main_image']  = Storage::disk('public')->put("/images", $data['main_image']);
        //$data['main_image']  = Storage::putFileAs('images', new File($data['main_image']), 'photo');
        $data['preview_image']  = Storage::disk('public')->put("/images",$data['preview_image']);

        $post = Post::firstOrCreate($data);

        if(isset($tags)) {

            $post->tags()->attach($tags);

        }

    }

    public function update($post, $data){

        if(isset($data['tags'])) {

            $tags = $data['tags'];
            unset($data['tags']);
        }

        if(isset($data['main_image'])) {

            Storage::disk('public')->delete("/images", $post->main_image);
            $data['main_image'] = Storage::disk('public')->put("/images", $data['main_image']);

        }
        if(isset($data['preview_image']))
            $data['preview_image'] = Storage::disk('public')->put("/images",$data['preview_image']);

        $post->update($data);

        if(isset($tags))
            $post->tags()->sync($tags);

        return $post;

    }
}
