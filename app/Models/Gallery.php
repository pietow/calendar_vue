<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image'];

    public static function boot() {

        parent::boot();

        static::updating(function($item) {
            if($item->isDirty('image')){
                $deletePath = '/images/'.$item->getOriginal('image');
                $del = Storage::disk('public')->delete($deletePath);
                return true;
            }
        });

        static::deleting(function($item) {
            $deletePath = '/images/'.$item->getOriginal('image');
            $del = Storage::disk('public')->delete($deletePath);
            foreach ( $item->GalleryItems()->get()  as $child ) {
                $deletePath = '/images/'.$child->image;
                $del = Storage::disk('public')->delete($deletePath);
                  
            }
            return true;
        });
    }

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

    public function getChildAttrAttribute()
    {
        return $this->GalleryItems()->getRelated()->attr; 
    }
}
