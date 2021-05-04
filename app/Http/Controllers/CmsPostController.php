<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\PostItem;
use App\Classes\saveFile;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PostInterface;

class CmsPostController extends Controller
{
    //A protected variable to hold the Repository
    protected $post;

    public function __construct(PostInterface $post){
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.cms-index-posts')->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = new Post();
        $postItems = new PostItem();
        $attr = $posts->attr;

        $childAttr = $postItems->attr;

        return view('dashboard.cms-create-posts', compact("attr", "childAttr"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $id = $this->post->store($request)->id;
        $this->post->storeChild($request, $id);
        $this->post->multiUpload($request, $id);

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
        $post = Post::findOrFail($id);
        $postItems = new PostItem();
        $attr = $post->attr;
        $childAttr = $postItems->attr;
        return view('dashboard.cms-edit-posts', compact("attr", "childAttr", "post"));
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
        $this->post->update($request, $id);
        $this->post->updateChildren($request, $id);
        $this->post->multiUpload($request, $id);

        return redirect()->route('posts.edit', $id)->with('success', 'File has successfully uploaded!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
