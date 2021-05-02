<?php

namespace App\Repositories;

use App\Models\Post;
use App\Classes\saveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostRepository
{
    public function updateNewPost(Request $request, $id)
    {
        #########################################
        $title = $request->title;
        $upPost = Post::find($id);
        $upPost->update(['title' => $title]);
        if($request->hasFile('image') === true) {
            $saverObj = new saveFile($request->file("image")); 
            $path = $saverObj->store('public/images/blog'); 
            $upPost->update(['image' => $path]);

        }
        ##############################################

        #############################################
        $parameter = collect($request->all());
        $descriptions = $parameter->filter(function ($value, $key) {
            return Str::contains($key, 'description-');
        });
        $imgs = $parameter->filter(function ($value, $key) {
            return Str::contains($key, 'image-');
        });

        //get the indices of PostItem
        $i1 = $descriptions->map(function ($value, $key) {
            return Str::of($key)->split('/[a-zA-Z-]+/')->last();
        });
        $i2 = $imgs->map(function ($value, $key) {
            return Str::of($key)->split('/[a-zA-Z-]+/')->last();
        });
        $indices = $i1->merge($i2)->flip()->keys();
        #################################################

        ##############################################

        foreach ( $indices  as  $childId ) {
            $upPost->PostItems()->find($childId)->update(['description' => $request['description-'.$childId]]);
            if($request->hasFile('image-'.$childId) === true) {
                $saverObj = new saveFile($request->file("image-".$childId)); 
                $path = $saverObj->store('public/images/blog');

                $upPost->PostItems()->find($childId)->update(['image' => $path]);
            }
        }
        #########################################################
        
    }
}
