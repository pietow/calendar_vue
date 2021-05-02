<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\PostItem;
use App\Classes\saveFile;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

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

        $saverObj = new saveFile($request->file("image")); 
        $path = $saverObj->store('public/images/blog');
        $title = $request->title;

        $saverObj = new saveFile($request->file("child-image")); 
        $childPath = $saverObj->store('public/images/blog');
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

        
        if($request->hasFile('upload') === true) {
            foreach ($request->upload as $image) {
                $saverObj = new saveFile($image); 
                $childPath = $saverObj->store('public/images/blog');
                $newPostItem = PostItem::create([
                    'post_id' => $newPost->id,
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
        #########################################
        $title = $request->title;
        $upPost = Post::find($id);
        $upPost->update(['title' => $title]);
        if($request->hasFile('image') === true) {
            $saverObj = new saveFile($request->file("image")); 
            $path = $saverObj->store('public/images/blog'); 
            $deletePath = '/images/'.$upPost->getOriginal('image');
            Storage::disk('public')->delete($deletePath);
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
        /* dd($request->hasFile('image-'.$childId)); */
            /* dump($request['description-'.$childId]); */
            $upPost->PostItems()->find($childId)->update(['description' => $request['description-'.$childId]]);
            if($request->hasFile('image-'.$childId) === true) {
                $saverObj = new saveFile($request->file("image-".$childId)); 
                $path = $saverObj->store('public/images/blog');
                $deletePath = '/images/'.$upPost->PostItems()->find($childId)->image ;
                Storage::disk('public')->delete($deletePath);

                $upPost->PostItems()->find($childId)->update(['image' => $path]);
            }
            
              
        }
        #########################################################

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
