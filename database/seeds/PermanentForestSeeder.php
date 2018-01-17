<?php

use Illuminate\Database\Seeder;
use App\Models\PermanentForest;

class PermanentForestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermanentForest::truncate();
    }
}
