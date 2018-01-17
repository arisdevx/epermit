<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantConveniencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_conveniences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->integer('area_id');
            $table->integer('convenience_id');
            $table->datetime('starting_date');
            $table->datetime('ending_date');
            $table->string('days_total', 50);
            $table->string('participant', 50);
            $table->decimal('amount', 20, 2);
            $table->integer('applicant_id');
            $table->string('type', 15);
            $table->string('eco_park_type', 3);
            $table->integer('eco_park_id');
            $table->integer('convenience_category_id');
            $table->string('nationality', 1);
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
        Schema::dropIfExists('applicant_conveniences');
    }
}
