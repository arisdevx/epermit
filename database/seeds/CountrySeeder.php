<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $countries = config('country');

        foreach($countries as $key => $value)
        {
        	Country::insert([
        		'name' => ucfirst($value),
        		'code' => $key
        	]);
        }
    }
}
