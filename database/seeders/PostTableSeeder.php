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
        }
    }
}
