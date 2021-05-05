<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Classes\saveFile;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\CmsInterface;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

class CmsGalleryController extends Controller
{
    //A protected variable to hold the Repository
    protected $post;

    public function __construct(CmsInterface $gallery){
        $this->gallery = $gallery;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = $this->gallery->index();
        return view('dashboard.cms-index-galleries', compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attr = $this->gallery->Attr();
        $childAttr = $this->gallery->ChildAttr();

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

        $id = $this->gallery->store($request)->id;
        $this->gallery->storeChild($request, $id);
        $this->gallery->multiUpload($request, $id);

        return redirect()->route('galleries.create')->with('success', 'File has successfully uploaded!');
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
        $gallery = $this->gallery->find($id);
        $attr = $this->gallery->attr();
        $childAttr = $this->gallery->childAttr();

        return view('dashboard.cms-edit-galleries', compact("attr", "childAttr", "gallery"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        $this->gallery->update($request, $id);
        $this->gallery->updateChildren($request, $id);
        $this->gallery->multiUpload($request, $id);

        return redirect()->route('galleries.edit', $id)->with('success', 'File has successfully uploaded!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gallery->destroy($id);
        return redirect()->route('galleries.index');
    }
}
