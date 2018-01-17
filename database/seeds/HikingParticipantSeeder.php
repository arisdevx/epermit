<?php

use Illuminate\Database\Seeder;
use App\Models\HikingParticipant;

class HikingParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikingParticipant::truncate();
    }
}
