<?php

use Illuminate\Database\Seeder;
use App\Models\ApplicantOtherActivityDeclaration;

class ApplicantOtherActivityDeclarationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantOtherActivityDeclaration::truncate();
    }
}
