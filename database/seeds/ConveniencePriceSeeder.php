<?php

use Illuminate\Database\Seeder;
use App\Models\ConveniencePrice;

class ConveniencePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConveniencePrice::truncate();
    }
}
