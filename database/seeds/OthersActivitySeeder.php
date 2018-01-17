<?php

use Illuminate\Database\Seeder;
use App\Models\OthersActivity;

class OthersActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OthersActivity::truncate();
    }
}
