<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'ASIA',
            'name' => 'EUROPE',
            'name' => 'AFRICA',
            'name' => 'VISA',
            'name' => 'TIPS',
            'name' => 'FOOD',
            'name' => 'LIFE IN SAIGON',
        ]);
    }
}
