<?php

use Illuminate\Database\Seeder;
use App\Models\HikingDeclaration;

class HikingDeclarationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingDeclaration::truncate();
    }
}
