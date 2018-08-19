<?php

use Illuminate\Database\Seeder;
use App\Models\HikingGuide;

class HikingGuideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingGuide::truncate();
    }
}
