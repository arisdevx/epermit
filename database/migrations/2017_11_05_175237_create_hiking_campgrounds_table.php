<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingCampgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiking_campgrounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->integer('mountain_campground_id');
            $table->string('day');
            $table->string('status', 1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hiking_campgrounds');
    }
}