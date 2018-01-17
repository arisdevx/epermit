<?php

use Illuminate\Database\Seeder;
use App\Models\UserAccessLog;

class UserAccessLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAccessLog::truncate();
    }
}
