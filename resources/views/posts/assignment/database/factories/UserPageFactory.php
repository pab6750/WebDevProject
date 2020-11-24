<?php

namespace Database\Factories;

use App\Models\UserPage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPage::class;

    protected $highestIndex = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //this is used to ensure that each user has exactly one user page
        $this->highestIndex++;

        return [
            //
            'profile_picture' => 'profile picture directory',
            'description' => 'description',
            'user_id' => $this->highestIndex
        ];
    }
}
