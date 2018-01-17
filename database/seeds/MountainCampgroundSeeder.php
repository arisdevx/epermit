<?php

use Illuminate\Database\Seeder;
use App\Models\MountainCampground;

class MountainCampgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MountainCampground::truncate();
    }
}
