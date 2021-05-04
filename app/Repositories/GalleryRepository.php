<?php

namespace App\Repositories;

use App\Classes\saveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery;
use App\Repositories\GalleryInterface;

class GalleryRepository implements GalleryInterface
{
    private $indices;

    /**
     * Listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gallery::all();
    }

    /**
     * Attributes for the form for creating a new resource.
     *
     */
    public function attr()
    {
        $posts = new Gallery();
        return $posts->attr;
    }

    /**
     * Attributes for the form for creating a new resource.
     *
     */

    public function childAttr()
    {
        $posts = new Gallery();
        return $posts->childAttr;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function store(Request $request)
    {
        $saverObj = new saveFile($request->file("image")); 
        $path = $saverObj->store('public/images/blog');
        $title = $request->title;
        return Gallery::create([
            'image' => $path,
        ]);
    }

    /**
     * Stores children of specific resource in storage
     *
     * @param Illuminate\Http\Request $request
     * @param int $id
     */
    public function storeChild(Request $request, $id)
    {
        $saverObj = new saveFile($request->file("child-image")); 
        $childPath = $saverObj->store('public/images/blog');

        $post = Gallery::find($id);
        $post->GalleryItems()->create([
            'image' => $childPath,
        ]);
    
        
    }

    /**
     * Show the specified resource for editing form
     *
     * @param  int  $id
     */
    public function find($id)
    {
        return Gallery::find($id);
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
        $upPost = Gallery::find($id);
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
            if($request->hasFile('image-'.$childId) === true) {
                $saverObj = new saveFile($request->file("image-".$childId)); 
                $path = $saverObj->store('public/images/blog');
                Gallery::find($id)->GalleryItems()->find($childId)->update(['image' => $path]);
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
                Gallery::find($id)->PostItems()->create([
                    'image' => $childPath,
                ]);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::destroy($id);
    }

}
