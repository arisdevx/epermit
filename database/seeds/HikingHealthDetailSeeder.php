<?php

use Illuminate\Database\Seeder;
use App\Models\HikingHealthDetail;

class HikingHealthDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingHealthDetail::truncate();
    }
}
