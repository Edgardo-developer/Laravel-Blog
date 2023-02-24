<?php
namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try {
            DB::beginTransaction();
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);

            if (isset($data['tag_ids'])){
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $post = Post::firstOrCreate($data);
            if (isset($data['tag_ids'])){
                $post->tags()->attach($tags);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post){
        try {
            DB::beginTransaction();
            $data['preview_image'] = isset($data['preview_image']) ? Storage::disk('public')->put(
                'images',
                $data['preview_image']
            ) : "";
            $data['main_image'] = isset($data['main_image']) ? Storage::disk('public')->put(
                'images',
                $data['main_image']
            ) : "";

            if ($data['tag_ids']){
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $post->update($data);

            if ($data['tag_ids']) {
                $post->tags()->sync($tags);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::commit();
            abort(500);
        }
    }
}
