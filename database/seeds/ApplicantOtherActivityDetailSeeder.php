<?php

use Illuminate\Database\Seeder;
use App\Models\ApplicantOtherActivityDetail;

class ApplicantOtherActivityDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantOtherActivityDetail::truncate();
    }
}
