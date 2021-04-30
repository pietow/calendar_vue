<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Http\Requests\StoreGalleryRequest;
use App\Classes\saveFile;

class CmsGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('dashboard.cms-index-galleries', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = new Gallery();
        $galleryItems = new GalleryItem();
        $attr = $galleries->attr;
        $childAttr = $galleryItems->attr;
        
        return view('dashboard.cms-create-galleries', compact("attr", "childAttr"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $saverObj = new saveFile($request->file("image")); 
        $path = $saverObj->store('public/images/blog');
        $title = $request->title;

        $saverObj = new saveFile($request->file("child-image")); 
        $childPath = $saverObj->store('public/images/blog');

        $newGallery = Gallery::create([
            'title' => $title,
            'image' => $path,
        ]);
        $newGalleryItem = GalleryItem::create([
            'gallery_id' => $newGallery->id,
            'image' => $childPath,
        ]);


        if($request->hasFile('upload') === true) {
            foreach ($request->upload as $image) {
                $saverObj = new saveFile($image); 
                $childPath = $saverObj->store('public/images/blog');
                $newGalleryItem = GalleryItem::create([
                    'gallery_id' => $newGallery->id,
                    'image' => $childPath,
                ]);
            }
        }

        return redirect()->route('posts.create')->with('success', 'File has successfully uploaded!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        return redirect()->route('galleries.index');
    }
}
