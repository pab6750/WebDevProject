<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Enter creative title here',
                                                    'I made this today!',
                                                    'This must be a Thursday. I could never get the hang of Thursdays',
                                                    'I love making these maps',
                                                    'This is the best web application ever. It probably deserves a good mark!',
                                                    'Chicken!',
                                                    'SSSHHHH! The Elder Bear is sleeping!',
                                                    'Please comment to give me feedback',
                                                    'I wonder if P = NP',
                                                    'I am trapped in a laravel factory forced to seed tables forever. HELP ME']),
            'image' => $this->faker->randomElement(['map1.jpg',
                                                    'map2.jpg',
                                                    'map3.jpg',
                                                    'map4.jpg',
                                                    'map5.jpg',
                                                    'map6.jpg',
                                                    'map7.jpg',
                                                    'map8.jpg',]),
            'user_id' => User::inRandomOrder()->first()->id
         ];
    }
}
