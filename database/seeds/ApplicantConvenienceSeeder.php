<?php

use Illuminate\Database\Seeder;
use App\Models\ApplicantConvenience;

class ApplicantConvenienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantConvenience::truncate();
    }
}
