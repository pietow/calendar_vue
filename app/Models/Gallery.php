<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryItem;

class Gallery extends Model
{
    use HasFactory;

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
