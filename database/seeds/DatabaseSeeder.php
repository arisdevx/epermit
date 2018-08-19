<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ActivityLogDetailSeeder::class);
        $this->call(ActivityLogSeeder::class);
        $this->call(ApplicantConvenienceDeclarationSeeder::class);
        $this->call(ApplicantConveniencePeopleSeeder::class);
        $this->call(ApplicantConvenienceSeeder::class);
        $this->call(ApplicantConvenienceUnitSeeder::class);
        $this->call(ApplicantOtherActivityDeclarationSeeder::class);
        $this->call(ApplicantOtherActivityDetailSeeder::class);
        $this->call(ApplicantOtherActivitySeeder::class);
        $this->call(ApplicantSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(CapacityCategorySeeder::class);
        $this->call(ConvenienceCategorySeeder::class);
        $this->call(ConveniencePriceSeeder::class);
        $this->call(ConvenienceSeeder::class);
        $this->call(ConvenienceSubCategorySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(EcoParkSeeder::class);
        $this->call(GuideConfigSeeder::class);
        $this->call(HikingBiodataSeeder::class);
        $this->call(HikingCampgroundSeeder::class);
        $this->call(HikingDeclarationSeeder::class);
        $this->call(HikingEmergencySeeder::class);
        $this->call(HikingGuideTableSeeder::class);
        $this->call(HikingHealthDetailSeeder::class);
        $this->call(HikingHealthSeeder::class);
        $this->call(HikingInformationSeeder::class);
        $this->call(HikingInsuranceSeeder::class);
        $this->call(HikingLocationSeeder::class);
        $this->call(HikingParticipantSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(MountainCampgroundSeeder::class);
        $this->call(MountainSeeder::class);
        $this->call(OthersActivitySeeder::class);
        $this->call(PermanentForestSeeder::class);
        $this->call(PriceCategorySeeder::class);
        $this->call(RegionalForestrySeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(StateForestrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(StateUserTableSeeder::class);
        $this->call(UserAccessLogSeeder::class);
        $this->call(UserLocationSeeder::class);
    }
}
