<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMountainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('location', 255);
            $table->string('campground', 1);
            $table->string('capacity', 5);
            $table->decimal('price', 20, 2);
            $table->decimal('other_price', 20, 2);
            $table->integer('state_id');
            $table->integer('area_id');
            $table->string('travel_day', 50);
            $table->string('travel_night', 50);
            $table->integer('permanent_forest_id');
            $table->string('active', 1);
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
        Schema::dropIfExists('mountains');
    }
}
