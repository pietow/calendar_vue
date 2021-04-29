<?php

namespace App\Classes;

use Illuminate\Support\Str;

class saveFile
{
    public function __construct($storage_path)
    {
        $this->storage_path = $storage_path;
    }

    /**
     * store file in storage
     *
     * @param mixed $image
     * @returns changed path
     */
    public function store($image)
    {
        $path = $image->store($storage_path);
        return Str::of($path)->split('/[\/]+/')->slice(-2)->join('/');
    }
}
