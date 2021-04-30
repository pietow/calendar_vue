<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryItem;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image'];

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class);
    }

    /**
     * get fillable attributes
     *
     * @return array
     */
    public function getAttrAttribute()
    {
        return $this->fillable;
    }
}
