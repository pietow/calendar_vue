<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\PostItem;

class CmsPostController extends Controller
{
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
        $posts = Post::all();
        $postItems = PostItem::all();
        $attr = $posts->first()->attr;
        $childAttr = $postItems->first()->attr;

        return view('dashboard.cms-create-posts', compact("attr", "childAttr"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required',
            'description' => 'required',
        ]);

        $path = $request->file("image")->store('public/images/blog');
        $path = Str::of($path)->split('/[\/]+/')->slice(-2)->join('/');
        $title = $request->title;

        $childPath = $request->file("child-image")->store('public/images/blog');
        $childPath = Str::of($childPath)->split('/[\/]+/')->slice(-2)->join('/');
        $description = $request->description;


        $newPost = Post::create([
            'title' => $title,
            'image' => $path,
        ]);
        $newPostItem = PostItem::create([
            'post_id' => $newPost->id,
            'description' => $description,
            'image' => $childPath,
        ]);
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
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
