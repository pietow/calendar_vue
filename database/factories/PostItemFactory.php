<?php

namespace Database\Factories;

use App\Models\PostItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /* 'post_id' => $id, */
            'description' => $this->faker->paragraph(),
            'image' => 'blog/screem.jpg'
        ];
    }
}
