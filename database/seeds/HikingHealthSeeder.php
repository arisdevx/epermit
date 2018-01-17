<?php

use Illuminate\Database\Seeder;
use App\Models\HikingHealth;

class HikingHealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingHealth::truncate();
    }
}
