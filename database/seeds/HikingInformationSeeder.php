<?php

use Illuminate\Database\Seeder;
use App\Models\HikingInformation;

class HikingInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingInformation::truncate();
    }
}
