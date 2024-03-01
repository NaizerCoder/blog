<?php

namespace App\Service;

use App\Models\Post;
use App\Personal\RandomName;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data, $request)
    {

        try {

            DB::beginTransaction();

            if (isset($data['tags'])) {

                $tags = $data['tags'];
                unset($data['tags']);
            }
            $extension = $request->file('main_image')->extension();
            $name_main_img = RandomName::get(5) . "." . $extension;
            $name_preview_img = RandomName::get(5) . "." . $extension;

            //dd($request->file('main_image')->getClientOriginalName());

            $data['main_image'] = Storage::disk('img')->putFileAs('posts', new File($data['main_image']), "$name_main_img");
            $data['preview_image'] = Storage::disk('img')->putFileAs('posts', new File($data['preview_image']), $name_preview_img);

            //$data['main_image'] = Storage::disk('public')->put("/images", $data['main_image']);

            $post = Post::firstOrCreate($data);

            if (isset($tags)) {

                $post->tags()->attach($tags);

            }

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            dd($exception->getMessage());

            abort('404');
        }

    }

    public function update($request, $post, $data)
    {

        try {
            DB::beginTransaction();

            if (isset($data['tags'])) {

                $tags = $data['tags'];
                unset($data['tags']);
            } else $tags = [];

            if (isset($data['main_image'])) {

                $extension = $request->file('main_image')->extension();
                $name_main_img = RandomName::get(5) . "." . $extension;

                Storage::disk('img')->delete("posts", $post->main_image);
                $data['main_image'] = Storage::disk('img')->putFileAs('/posts', new File($data['main_image']), "$name_main_img");
                //$data['main_image'] = Storage::disk('public')->put("/images", $data['main_image']);

            }


            if (isset($data['preview_image'])) {

                $extension = $request->file('preview_image')->extension();
                $name_preview_img = RandomName::get(5) . "." . $extension;

                Storage::disk('img')->delete("posts", $post->preview_image);
                $data['preview_image'] = Storage::disk('img')->putFileAs('/posts', new File($data['preview_image']), $name_preview_img);
                //$data['preview_image'] = Storage::disk('public')->put("/images", $data['preview_image']);
            }

            $post->update($data);
            $post->tags()->sync($tags); //ещё есть detach

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();
            dd($exception->getMessage());

            abort('500');
        }


        return $post;

    }
}
