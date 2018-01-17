<?php

use Illuminate\Database\Seeder;
use App\Models\ApplicantConvenienceDeclaration;

class ApplicantConvenienceDeclarationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantConvenienceDeclaration::truncate();
    }
}
