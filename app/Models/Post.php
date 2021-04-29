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
     * get filter array of attributes
     *
     * @return Illuminate\Support\Collection
     */
    public function getAttrAttribute()
    {
        $attr = collect(array_keys($this->attributes));
        $attr = $attr->filter(function ($value, $key) {
            return $value != 'id' & $value != 'created_at' & $value != 'updated_at';
        });
        return $attr;
    }
}
