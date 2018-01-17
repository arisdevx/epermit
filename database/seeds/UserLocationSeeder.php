<?php

use Illuminate\Database\Seeder;
use App\Models\UserLocation;

class UserLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLocation::truncate();
    }
}
