<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Children',
            'image' => 'blog/small_kid.JPG'
        ];
    }

    /* $factory->state(Gallery::class, 'model' , */
    /*     [ */
    /*         'title' => 'all about fashion', */
    /*         'image' => 'model.JPG' */
    /*     ]); */
}
