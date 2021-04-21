<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostItem;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PostItem = new PostItem;
        Post::factory()
            ->count(10)
            ->create()
            ->each(function ($post) use($PostItem){
                PostItem::factory()
                        ->count(2)
                        ->create([
                            'post_id' => $post->id
                        ]);
            });
            
    }
}
