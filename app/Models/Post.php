<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostItem;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image'];

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
}
