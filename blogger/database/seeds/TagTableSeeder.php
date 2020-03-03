<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tag = new Tag();
        $tag->name = 'Asia';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Europe';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Africa';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Visa';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Tips';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Food';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Lifetime';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Travel';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Dailynews';
        $tag->save();
    }
}
