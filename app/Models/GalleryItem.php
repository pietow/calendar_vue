<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;
    protected $fillable = ['gallery_id','image'];

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
