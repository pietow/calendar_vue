<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryItem extends Model
{
    use HasFactory;
    protected $fillable = ['gallery_id','image'];

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
            return true;
        });
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
