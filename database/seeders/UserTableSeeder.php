<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User;

        $u->name = "admin";
        $u->isAdmin = 1;
        $u->email = "admin@email.com";
        $u->email_verified_at = now();
        $u->password = Hash::make('password');
        $u->remember_token = Str::random(10);

        $u->save();

        User::factory()->times(50)->create();

        $users = User::get();

        for($i = 0; $i < 51; $i++)
        {

          $possible_images = ['default_profile_pic.jpg',
                             'profile_picture1.jpg',
                             'profile_picture2.jpg',
                             'profile_picture3.jpg',
                             'profile_picture4.jpg',
                             'profile_picture5.jpg',
                             'profile_picture6.jpg',
                             'profile_picture7.jpg',
                             'profile_picture8.jpg',];
            shuffle($possible_images);
            $users[$i]->image()->create(['filename' => $possible_images[0]]);
        }
    }
}
