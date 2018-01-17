<?php

use Illuminate\Database\Seeder;
use App\Models\ActivityLogDetail;

class ActivityLogDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityLogDetail::truncate();
    }
}
