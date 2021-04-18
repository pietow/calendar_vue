<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class ListGalleryGrid extends Controller
{
    public function __invoke($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery')->with("gal", $gallery);
        
    }
}
