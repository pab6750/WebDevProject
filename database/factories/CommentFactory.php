<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->randomElement(['Good Job!',
                                                          'Amazing concept',
                                                          'Can I pay you in exposure?',
                                                          'I cannot wait to see the rest',
                                                          'The ships hung in the sky in much the same way that bricks do not',
                                                          'If there is anything more important than my ego around, I want it caught and shot now',
                                                          'So long, and thanks for all the fish',
                                                          'We demand rigidly defined areas of doubt and uncertainty!']),
            'user_id' => User::inRandomOrder()->first()->id,
            'post_id' => Post::inRandomOrder()->first()->id
        ];
    }
}
