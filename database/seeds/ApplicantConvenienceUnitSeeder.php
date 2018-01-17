<?php

use Illuminate\Database\Seeder;
use App\Models\ApplicantConvenienceUnit;

class ApplicantConvenienceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantConvenienceUnit::truncate();
    }
}
