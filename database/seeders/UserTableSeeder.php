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
        $u->email = "admin@email.com";
        $u->email_verified_at = now();
        $u->password = Hash::make('password');
        $u->remember_token = Str::random(10);

        $u->save();

        User::factory()->times(50)->create();
    }
}
