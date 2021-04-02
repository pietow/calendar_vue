<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* User::factory(1)->create(); */
        GalleryItem::truncate();
        DB::table('galleries')->delete();
        Gallery::factory(1)->create();
        Gallery::factory(1)->create([
            'title' => 'all about fashion',
            'image' => 'blog/model.JPG'
        ]);
        Gallery::factory(1)->create([
            'title' => 'me and myself - self-portaits',
            'image' => 'blog/screem.jpg'
        ]);

        GalleryItem::factory()->create();
        GalleryItem::factory()->create([
            'image' => 'blog/bio.jpg'
        ]);
        GalleryItem::factory()->create([
            'image' => 'blog/buddha.jpg'
        ]);
        GalleryItem::factory()->create([
            'image' => 'blog/horned.jpg'
        ]);
        GalleryItem::factory()->create([
            'image' => 'blog/palais.jpg'
        ]);
        GalleryItem::factory()->create([
            'image' => 'blog/pray.jpg'
        ]);
        GalleryItem::factory()->create([
            'image' => 'blog/small_towers.jpg'
        ]);
        GalleryItem::factory()->create([
            'image' => 'blog/street_fest.jpg'
        ]);

#        $this->call(UserSeeder::class);
    }
}
