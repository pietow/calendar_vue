<?php

namespace App\Repositories;

use App\Models\Post;
use App\Classes\saveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\PostInterface;

class PostRepository implements PostInterface
{
    private $indices;


    public function store(Request $request)
    {
        $saverObj = new saveFile($request->file("image")); 
        $path = $saverObj->store('public/images/blog');
        $title = $request->title;
        return Post::create([
            'title' => $title,
            'image' => $path,
        ]);
    }

    public function storeChild(Request $request, $id)
    {
        $saverObj = new saveFile($request->file("child-image")); 
        $childPath = $saverObj->store('public/images/blog');
        $description = $request->description;

        $post = Post::find($id);
        $post->PostItems()->create([
            'description' => $description,
            'image' => $childPath,
        ]);
    
        
    }
    /**
     * updates Post model
     *
     * @param Request $request
     * @param mixed $id
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $upPost = Post::find($id);
        $upPost->update(['title' => $title]);
        if($request->hasFile('image') === true) {
            $saverObj = new saveFile($request->file("image")); 
            $path = $saverObj->store('public/images/blog'); 
            $upPost->update(['image' => $path]);
        }
    }

    /**
     * updates child model of the postmodel
     *
     * @param Request $request
     * @param mixed $id
     */
    public function updateChildren(Request $request, $id)
    {
        $this->indices = $this->getIndices($request);
        foreach ( $this->indices  as  $childId ) {
            Post::find($id)->PostItems()->find($childId)->update(['description' => $request['description-'.$childId]]);
            if($request->hasFile('image-'.$childId) === true) {
                $saverObj = new saveFile($request->file("image-".$childId)); 
                $path = $saverObj->store('public/images/blog');
                Post::find($id)->PostItems()->find($childId)->update(['image' => $path]);
            }
        }
    }

    /**
     * auxilary method to determine the requested change of the child items by id
     *
     * @param Request $request
     *
     * @return array if indices
     */
    public function getIndices(Request $request)
    {
        $parameter = collect($request->all());
        $dummy = $parameter->keys()->filter(function ($value) {
            return (Str::contains($value, '-'));
        });
        return $dummy->map(function($value) {
            return preg_replace('/[^0-9]/', '', $value);  
        })->unique();
    }

    public function multiUpload(Request $request, $id)
    {
        if($request->hasFile('upload') === true) {
            foreach ($request->upload as $image) {
                $saverObj = new saveFile($image); 
                $childPath = $saverObj->store('public/images/blog');
                Post::find($id)->PostItems()->create([
                    'image' => $childPath,
                ]);
            }
        }
        
    }

}
