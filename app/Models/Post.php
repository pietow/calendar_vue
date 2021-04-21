<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostItem;

class Post extends Model
{
    use HasFactory;

    public function PostItems()
    {
        return $this->hasMany(PostItem::class);
    }
}
