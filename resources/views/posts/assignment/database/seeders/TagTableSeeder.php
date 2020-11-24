<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $t1 = new Tag;
        $t1->type = "Map";
        $t1->save();

        $t2 = new Tag;
        $t2->type = "Character";
        $t2->save();
    }
}
