<?php

use Illuminate\Database\Seeder;
use App\Models\HikingCampground;

class HikingCampgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingCampground::truncate();
    }
}
