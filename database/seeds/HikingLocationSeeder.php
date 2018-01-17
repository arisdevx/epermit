<?php

use Illuminate\Database\Seeder;
use App\Models\HikingLocation;

class HikingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingLocation::truncate();
    }
}
