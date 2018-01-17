<?php

use Illuminate\Database\Seeder;
use App\Models\PriceCategory;

class PriceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceCategory::truncate();
    }
}
