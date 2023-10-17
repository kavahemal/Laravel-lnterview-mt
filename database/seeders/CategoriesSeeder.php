<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Categories::create(['name' => "Category 1"]);
        $sub_category = Categories::create(['name' => "Category 1 1", "parent_id" => $category->id]);
        Categories::create(['name' => "Category 1 2", "parent_id" => $category->id]);
        Categories::create(['name' => "Category 1 1 1", "parent_id" => $sub_category->id]);
        $category = Categories::create(['name' => "Category 2"]);
        Categories::create(['name' => "Category 2 1", "parent_id" => $category->id]);
        Categories::create(['name' => "Category 2 2", "parent_id" => $category->id]);
    }
}
