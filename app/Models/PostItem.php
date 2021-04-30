<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostItem extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','description', 'image'];

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
