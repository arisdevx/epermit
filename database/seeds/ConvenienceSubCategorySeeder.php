<?php

use Illuminate\Database\Seeder;
use App\Models\ConvenienceSubCategory;

class ConvenienceSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConvenienceSubCategory::truncate();
    }
}
