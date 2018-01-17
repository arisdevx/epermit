<?php

use Illuminate\Database\Seeder;
use App\Models\RegionalForestry;

class RegionalForestrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegionalForestry::truncate();
    }
}
