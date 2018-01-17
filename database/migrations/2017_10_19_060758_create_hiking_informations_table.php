<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiking_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permanent_forest_id');
            $table->integer('mountain_id');
            $table->datetime('starting_date');
            $table->datetime('starting_time');
            $table->datetime('ending_date');
            $table->datetime('arrival_time');
            $table->string('mountain_guide', 150);
            $table->string('participants_total', 5);
            $table->string('day', 50);
            $table->decimal('amount', 20, 2);
            $table->integer('applicant_id');
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
        Schema::dropIfExists('hiking_informations');
    }
}
