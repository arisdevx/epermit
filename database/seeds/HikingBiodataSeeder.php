<?php

use Illuminate\Database\Seeder;
use App\Models\HikingBiodata;

class HikingBiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingBiodata::truncate();
    }
}
