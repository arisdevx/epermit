<?php

use Illuminate\Database\Seeder;
use App\Models\StateForestry;

class StateForestrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StateForestry::truncate();
    }
}
