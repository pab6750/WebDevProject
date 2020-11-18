<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPage;

class UserPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserPage::factory()->times(50)->create();
    }
}
