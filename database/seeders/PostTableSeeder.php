<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $numberOfPosts = 100;

        Post::factory()->times($numberOfPosts)->create();

        $p = Post::get();

        for($i = 0; $i < $numberOfPosts; $i++)
        {
            //each post has at least one tag
            $tagId = Tag::inRandomOrder()->first()->id;
            $p[$i]->tags()->attach($tagId);

            $possible_images = ['map1.jpg',
                                'map2.jpg',
                                'map3.jpg',
                                'map4.jpg',
                                'map5.jpg',
                                'map6.jpg',
                                'map7.jpg',
                                'map8.jpg',];
            shuffle($possible_images);
            $p[$i]->image()->create(['filename' => $possible_images[0]]);

        }
    }
}
