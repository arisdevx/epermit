<?php

use Illuminate\Database\Seeder;
use App\Models\StateUser;

class StateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StateUser::truncate();
    }
}
