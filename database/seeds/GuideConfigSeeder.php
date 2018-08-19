<?php

use Illuminate\Database\Seeder;
use App\Models\GuideConfig;

class GuideConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuideConfig::truncate();
    }
}
