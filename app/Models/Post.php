<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostItem;
use Illuminate\Support\Facades\Storage;

class Post extends Model
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
            foreach ( $item->PostItems()->get()  as $child ) {
                $deletePath = '/images/'.$child->image;
                $del = Storage::disk('public')->delete($deletePath);
                  
            }
            return true;
        });

    }
    

    public function PostItems()
    {
        return $this->hasMany(PostItem::class);
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

    /**
     * get fillable attributes of related
     *
     * @return array
     */
    public function getChildAttrAttribute()
    {
        return $this->postItems()->getRelated()->attr; /* see https://laravel.com/api/8.x/Illuminate/Database/Eloquent/Relations/HasMany.html*/

    }
}
