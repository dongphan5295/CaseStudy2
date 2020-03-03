<?php

use App\Category;
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
        $category = new Category();
        $category->name = 'ASIA';
        $category->save();

        $category = new Category();
        $category->name = 'EUROPE';
        $category->save();

        $category = new Category();
        $category->name = 'AFRICA';
        $category->save();

        $category = new Category();
        $category->name = 'VISA';
        $category->save();

        $category = new Category();
        $category->name = 'TIPS';
        $category->save();

        $category = new Category();
        $category->name = 'FOOD';
        $category->save();

        $category = new Category();
        $category->name = 'LIFE IN SAIGON';
        $category->save();

    }
}
