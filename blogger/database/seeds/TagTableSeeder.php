<?php

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
        DB::table('tags')->insert([
            'name' => 'Asia',
            'name' => 'Europe',
            'name' => 'Africa',
            'name' => 'Visa',
            'name' => 'Tips',
            'name' => 'Food',
            'name' => 'Lifetime',
            'name' => 'Travel',
        ]);
    }
}
