<?php

use Illuminate\Database\Seeder;
use App\Models\MountainRelated;

class MountainRelatedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MountainRelated::truncate();
    }
}
