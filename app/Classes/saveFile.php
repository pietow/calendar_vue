<?php

namespace App\Classes;

use Illuminate\Support\Str;

class saveFile
{
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * store file in storage
     *
     * @param mixed $image
     * @returns changed path
     */
    public function store($storage_path)
    {
        $path = $this->image->store($storage_path);
        return Str::of($path)->split('/[\/]+/')->slice(-2)->join('/');
    }
}
