<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostItem extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','description', 'image'];

    public static function boot() {

        parent::boot();

        static::updating(function($item) {
            if($item->isDirty('image')){
                $deletePath = '/images/'.$item->getOriginal('image');
                $del = Storage::disk('public')->delete($deletePath);
                return true;
            }
        });

    }
    /**
     * get filter array of attributes
     *
     * @return Illuminate\Support\Collection
     */
    public function getAttrAttribute()
    {
        /* $attr = collect(array_keys($this->attributes)); */
        /* $attr = $attr->filter(function ($value, $key) { */
        /*     return $value != 'id' & $value != 'created_at' & $value != 'updated_at' & $value != 'post_id'; */
        /* }); */
        /* return $attr; */
        return $this->fillable;
    }
}
